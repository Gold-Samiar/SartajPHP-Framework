<?php

class App extends Sphp{
private $auth = "GUEST";
private $tblName = "";
private $masterFile = "";
/** @var page */
public $page = "";
public $tempform;
public $maintempform;
public $apppath = "";
public $phppath = "";
public $respath = "";
public $JSServer = null;
public $Client = null;
public $dbEngine = null;
public $debug = null;


public function __construct(){
global $masterf,$apppath,$phppath,$respath,$mysql,$ctrl;
$this->page = getDefaultPageObject();
    $tempobj = new TempFile("",true);
    $this->JSServer = getJSServer();
    $this->Client = getClient();
    $this->apppath = $apppath;
    $this->phppath = $phppath;
    $this->respath = $respath;
    $this->dbEngine = getDBEngine();
    $this->debug = $ctrl->debug;
    $this->setTempFile($tempobj);
    $this->maintempform = $tempobj;
    $this->showNotTempFile();
    $this->masterFile = $masterf;
    $this->onstart();
}
public function setup($tempobj){
    $this->maintempform = $tempobj;
    $this->ontempinit($tempobj);
// add event handler into components
    $this->fixCompEventHandlers($this->maintempform);
}
public function process($tempobj){ $this->ontempprocess($tempobj); }
public function processEvent(){
    $this->call_page_events();    
}
private function call_page_events(){
//    global $dynData,$page,$respath,$phppath;
    extract($GLOBALS);
if($this->page->isevent){
    $fun = "page_event_{$this->page->sact}";
    if(method_exists($this, $fun)){
    $this->{$fun}($this->page->evtp);
    }
}else if($this->page->isnew){
    $this->showTempFile();
    $JSServer->getAJAX();
    $this->page_new();
}else if($this->page->isdelete){
    $this->page_delete();
}else if($this->page->isview){
    $this->page_view();
}else if($this->page->issubmit){
    $this->page_submit();
    if($this->page->isinsert){
    $this->page_insert();
    }else if($this->page->isupdate){
    $this->page_update();
    }
}

if($this->tempform[0]){
    $this->maintempform->blnshowFront = true;
    $dynData = $this->tempform[1];
    $dynData->run();
    $this->render();
    include_once($this->masterFile);
}
    
}

/**
 * Set Internal Temp File. Internal Temp File Also render Page Components.
 * @param TempFile $obj 
 */
public function setTempFile($obj){
$this->tempform = array(true,$obj);
}
public function getTempFile() {
return $this->tempform[1];    
}
public function showTempFile(){
$this->tempform[0] = true;
}
public function showNotTempFile(){
$this->tempform[0] = false;
}
public function setTableName($dbtable){
    global $tblName;
    $tblName = $dbtable;
    $this->tblName = $dbtable;
}


public function onstart(){}
public function onready(){}
public function ontempinit($tempobj){}
public function ontempprocess($tempobj){}
public function page_delete(){}
public function page_view(){}
public function page_submit(){}
public function page_insert(){}
public function page_update(){}
public function page_new(){}
public function getEvent(){return $this->page->sact;}
public function getEventParameter(){return $this->page->evtp;}

public function onrun(){}
public function onrender(){}

public function run(){
    $this->onready();
    $this->onrun();
    $this->processEvent();
}
public function render(){
    $this->onrender();    
}

/**
 * Set MasterFile
 */
public function setMasterFile($masterFile){
    $this->masterFile = $masterFile;    
}
public function getAuthenticate($authenticates){
global $auth;
    $this->auth = $authenticates;
    $auth = $authenticates;
$this->page->Authenticate();
}
public function getSesSecurity(){
$this->page->sesSecure();
}

}

