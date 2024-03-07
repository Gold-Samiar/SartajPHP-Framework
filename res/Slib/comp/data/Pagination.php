<?php
/**
 * Description of Pagination
 *
 * @author SARTAJ
 */
namespace {

include_once("{$slibpath}/comp/ajax/Ajaxsenddata.php");

class Pagination extends \Sphp\tools\Control{
public $pageNo = -1;
public $totalPages = 1;
public $totalRows = 0;
public $perPageRows = 10;
public $sql = '';
public $pageCountSQL = '';
public $result;
public $row;
public $linkno = 10;
public $extraData = '';
public $strFormat = '';
public $fieldNames = '';
public $headNames = '';
public $colwidths = '';
public $where = '';
public $app = '';
public $blnEdit = false;
public $blnDelete = false;
public $eventName = 'show';
public $editeventName = 'view';
public $deleventName = 'delete';
private $evtp='';
private $ctrl='';
private $extra='page=';
private $baseName='';
private $sesID=false;
private $blnajax = false;
private $blndlg = true;
private $blnadd = true;
private $ajax = null;
public $cacheTime = 0;
private $cachefile = '';
private $cachekey = 'id';
private $cachesave = false;
private $header = '';
private $footer = '';
public $buttonnext = '';
public $buttonprev = '';
public $links = '';

public function __construct($name='',$fieldName='',$tableName='') {
$page = \SphpBase::page();
$ctrl = \SphpBase::sphp_router()->ctrl;
$tblName = \SphpBase::page()->tblName;
//\SphpBase::debug()->setMsg('tblName ' . $tableName);
if(SphpBase::page()->isSesSecure){
$this->sesID = true;
}
$this->init($name,'','');
if(\SphpBase::sphp_request()->request('page') != ""){
\SphpBase::sphp_request()->session($name.'p', \SphpBase::sphp_request()->request('page'));
\SphpBase::sphp_request()->session($name.'pc', $ctrl);
}else{
\SphpBase::sphp_request()->request('page', 1);
if(\SphpBase::sphp_request()->isSession($name.'pc') && \SphpBase::sphp_request()->session($name.'pc', $ctrl)){
\SphpBase::sphp_request()->request('page', \SphpBase::sphp_request()->session($name.'p'));
}
}
$this->pageNo = intval(\SphpBase::sphp_request()->request('page')) - 1;
if($tableName==''){
$this->dtable = $tblName;
}else{
$this->dtable = $tableName;
    }
$this->setHTMLName('');
}

    protected function genhelpPropList() {
        $this->addHelpPropFunList('getEventURL','Set Event Path to get page', getEventURL($this->eventName, $this->evtp, $this->ctrl, $this->extra, $this->baseName, $this->sesID),'$eventName, $evtp="", $ControllerName="", $extra="", $newBasePath="", $blnSesID=false');
        $this->addHelpPropFunList('setMsgName','Name Display in placeholder and Error','','$val');
        $this->addHelpPropFunList('setSQL','Set SQL Database Query','','$sql');
        $this->addHelpPropFunList('setPageCountSQL','Set SQL Query for Count Page, only need to set if you use setSQL','','$sql');
        $this->addHelpPropFunList('setPerPageRows','Set Per Page Rows Display','','$val');
        $this->addHelpPropFunList('setExtraData','Set Extra query string to post server with every page request','','$sql');
        $this->addHelpPropFunList('setCacheKey','Set Key for Cache default is id','','$val');
        $this->addHelpPropFunList('setCacheTime','Set Cache Expiry Time 0 mean no cache and -1 mean always data from cache','','$val');
        $this->addHelpPropFunList('setFieldNames','comma separated list for Database Table field name for auto sql, no need to setSQL','','$val');
        $this->addHelpPropFunList('setHeaderNames','comma separated list which is use to generate html table tag head section, match with filed list','','$val');
        $this->addHelpPropFunList('setColWidths','Set col width comma list for td tags','','$list');
        $this->addHelpPropFunList('setWhere','SQL Query logic like WHERE','','$val');
        $this->addHelpPropFunList('setApp','Bind with app controller','','$val');
        $this->addHelpPropFunList('setAjax','Enable AJAX','','');
        $this->addHelpPropFunList('setEdit','Enable Edit Button','','');
        $this->addHelpPropFunList('setDelete','Enable Delete Button','','');
        $this->addHelpPropFunList('setHeader','Set Header HTML','','$val');
        $this->addHelpPropFunList('setFooter','Set Footer HTML','','$val');
        $this->addHelpPropFunList('unsetDialog','Disable Dialog','','');
        $this->addHelpPropFunList('unsetAddButton','Disable Add Record Button','','$val');
        $this->addHelpPropList('dtable','comma list for database tables to query');
    }

public function getEventURL($eventName, $evtp='', $ControllerName='', $extra='', $newBasePath='', $blnSesID=false){
$this->eventName = $eventName;
$this->evtp=$evtp;
$this->ctrl=$ControllerName;
if($extra!=''){
$this->extra=$extra.'&page=';
}
$this->baseName=$newBasePath;
$this->sesID=$blnSesID;
    }
    public function getRow($field) {
        if(isset($this->row[$field])){
            return $this->row[$field];
        }else{
            return "";
        }
    }
public function setMsgName($val) { $this->msgName = $val;}
public function setSQL($sql){
$this->sql = $sql;
}
public function setPageCountSQL($sql){
$this->pageCountSQL = $sql;
}
public function setPerPageRows($val){
$this->perPageRows = intval($val);
}
public function setExtraData($val){
$this->extraData = $val;
}
public function setPageNo($val){
$this->pageNo = $val - 1;
}
public function getPageNo(){
return $this->pageNo + 1;
}
public function setLinkNo($val){
$this->linkno = $val;
}
public function setCacheFile($val){
$this->cachefile = $val;
}
public function setCacheSave(){
$this->cachesave = true;
}
public function setCacheKey($val){
$this->cachekey = $val;
}
public function setCacheTime($val){
$this->cacheTime = intval($val);
}
public function setFieldNames($val){
$this->fieldNames = $val;
}
public function setHeaderNames($val){
$this->headNames = $val;
}
public function setColWidths($val){
$this->colwidths = $val;
}
public function setWhere($val){
$this->where = $val;
}
public function setApp($val){
$this->app = $val;
}
public function setAjax(){
$this->blnajax = true;
 $this->ajax = new \Sphp\comp\ajax\Ajaxsenddata($this->name."ajax1");
$this->ajax->oncompcreate(array());
$this->eventName = $this->name ."_show";
$this->editeventName = $this->name ."_view";
$this->deleventName = $this->name ."_delete";
SphpJsM::addjQueryUI();
}
public function setEdit(){
$this->blnEdit = true;
}
public function setDelete(){
$this->blnDelete = true;
}
public function getPageBar(){
return $this->links;
}
public function getButtonNext(){
return $this->buttonnext;
}
public function getButtonPrev(){
return $this->buttonprev;
}
public function setHeader($val){
$this->header = $val;
}
public function setFooter($val){
$this->footer = $val;
}
public function unsetDialog(){
$this->blndlg = false;
}
public function unsetAddButton(){
$this->blnadd = false;
}

public function executeSQL(){
$mysql = \SphpBase::dbEngine();
$respath = \SphpBase::sphp_settings()->res_path;
  $stro = "";
// count total page
//$mysql->connect();
if($this->cachefile!=''){
$res = $mysql->fetchQuery($this->pageCountSQL,$this->cacheTime,$this->cachefile.'csql');
}else{
$res = $mysql->fetchQuery($this->pageCountSQL,$this->cacheTime);
    }
if ($res){
$row = current($res['news']);
//$totalRows = intval($row['count(id)']);
$totalRows = intval(current($row));
$this->totalRows = $totalRows;
$this->totalPages = intval(($totalRows + $this->perPageRows - 1) / $this->perPageRows);
if($this->pageNo < 0){
$this->pageNo = 0;
}
else if($this->pageNo + 1 > $this->totalPages){
$this->pageNo = $this->totalPages - 1 ;
}

$startat = $this->pageNo * $this->perPageRows;
if($startat<0){$startat=0;}
$this->result = $mysql->fetchQuery($this->sql." LIMIT $startat,$this->perPageRows",$this->cacheTime,$this->cachefile,$this->cachekey,$this->cachesave);
//$mysql->disconnect();
$stro = '';
if ($this->result){
if($this->fieldNames!='' && $this->strFormat==''){
$stro = '<table class="pagtable">';
if($this->headNames==''){
$this->headNames = $this->fieldNames;
}
$arr = explode(',',$this->headNames);
$lenw = -1;
$startw = 0;
$w = '';
if($this->colwidths!=''){
$arrw = explode(',',$this->colwidths);
$lenw = count($arrw)-1;
$startw = 0;
}
$stro .= "<tr class=\"paghead\">";
foreach($arr as $key=>$val){
if($lenw>=$startw){
$w = ' width="'.$arrw[$startw].'"';
$startw += 1;
}else{
 $w = '';
}
$stro .= "<th$w>$val</th>";
}
if($this->blnEdit){
$stro .= "<th width=\"10\">Edit</th>";
}
if($this->blnDelete){
$stro .= "<th width=\"10\">Delete</th>";
}
$stro .= "</tr>";
$blnf = true;
foreach($this->result as $key1=>$keyar){
foreach($keyar as $key=>$row){
$arr = explode(',',$this->fieldNames);
if($blnf){
$stro .= "<tr class=\"pagrow1\">";
$blnf = false;
}else{
$stro .= "<tr class=\"pagrow2\">";
$blnf = true;
    }
$startw = 0;
foreach($arr as $key=>$val){
if($lenw>=$startw){
$w = ' width="'.$arrw[$startw].'"';
$startw += 1;
}else{
 $w = '';
}
$stro .= "<td$w>".$row[$val]."</td>";
}
if($this->blnEdit){
$stro .= "<td width=\"25\"><a href=\"#\" onclick=\"pagiedit_$this->name('". getEventURL($this->editeventName,$row['id'],$this->app,$this->extraData,'',true)."');\" title=\"Click to Edit This Record\"><img src=\"". SphpBase::sphp_settings()->slib_res_path ."/comp/data/res/editBTN.gif\" border=\"0\" /></a></td>";
}
if($this->blnDelete){
$stro .= "<td width=\"25\"><a href=\"#\" onClick=\"confirmDel_$this->name('".getEventURL($this->deleventName,$row['id'],$this->app,$this->extraData,'',true)."')\" title=\"Click to Delete This Record\"><img src=\"". SphpBase::sphp_settings()->slib_res_path ."/comp/data/res/del.jpg\" border=\"0\" /></a></td>";
}

$stro .= "</tr>";
}
}
$stro .= "</table>";
$stro .= $this->getPaging();
}
else if($this->strFormat!=''){
    //$this->tempobj->HTMLParser->executePHPCode()
$stro = "";
$roote = $this->tempobj->getChildrenWrapper($this);
foreach($this->result as $key1=>$keyar){
 foreach($keyar as $index=>$this->row){
//$tmpf = new \Sphp\tools\TempFileChild($this->strFormat,true,null,$this->tempobj);
//$tmpf->run();
//$stro .= $tmpf->data;
$stro .= $this->tempobj->parseComponentChildren($roote);
 } }
 //echo $stro;
$this->unsetrenderTag();
$strom = $this->getPaging();
}
}
}
return $stro;
}

private function getPaging(){
    $lynx = "";
    $del = "";
$linkNo = $this->linkno;
$startPage = $this->getPageNo()- $linkNo;
$endPage = $this->getPageNo()+$linkNo;
if($startPage<1){
$startPage = 1;
}
if($endPage>$this->totalPages){
$endPage = $this->totalPages;
}
 $strstart = "<div class=\"pfloat-left\">";
for ($k=$startPage; $k<=$endPage; $k++) {
        if ($k != \SphpBase::sphp_request()->request('page')) {
if($this->blnajax){
         $lynx .= $strstart. "<a href=\"#\" onclick=\"getURL('". getEventURL($this->eventName,$this->evtp,$this->ctrl,$this->extra.$k,$this->baseName,$this->sesID)."');\">".($k)."</a></div>";
}else{
         $lynx .= $strstart."<a href=\"". getEventURL($this->eventName,$this->evtp,$this->ctrl,$this->extra.$k,$this->baseName,$this->sesID)."\">".($k)."</a></div>";    
}
        } else {
         $lynx .= $strstart.($k)."</div>";
        }
}
$startPage2 = $this->getPageNo();
$blnEndP = false;
$blnStartP = false;
if($startPage2>1){
$prev = $startPage2 - 1;
}else{
$prev = 1;
$blnStartP = true;
}
if($startPage2 >= $this->totalPages){
$next = $this->totalPages;
$blnEndP = true;
}else{
$next = $startPage2 + 1;
}
$edt = '';
/* use for multi delete functions
if($this->blnEdit){
    $edt = "&nbsp;&nbsp;<a class=\"pagedit\" href=\"". $this->linkURL. "?page=" . $next ."\">Edit</a>";
}
if($this->blnDelete){
    $del = "&nbsp;&nbsp;<a class=\"pagdelete\" href=\"". $this->linkURL. "?page=" . $next ."\">Delete</a>";
}
 *
 */
if($blnStartP){
$strlinkP = "";
}else{
if($this->blnajax){
    $strlinkP = "<a class=\"pagprev\" href=\"#\" onclick=\"getURL('". getEventURL($this->eventName,$this->evtp,$this->ctrl,$this->extra.$prev,$this->baseName,$this->sesID)."');\">Prev</a>&nbsp;&nbsp;";
}else{
    $strlinkP = "<a class=\"pagprev\" href=\"". getEventURL($this->eventName,$this->evtp,$this->ctrl,$this->extra.$prev,$this->baseName,$this->sesID)."\">Prev</a>&nbsp;&nbsp;";    
}
}
if($blnEndP){
$strlinkN = "";
}else{
if($this->blnajax){
    $strlinkN = "<a class=\"pagnext\"  href=\"#\" onclick=\"getURL('".getEventURL($this->eventName,$this->evtp,$this->ctrl,$this->extra.$next,$this->baseName,$this->sesID)."');\">Next</a>";
}else{
    $strlinkN = "<a class=\"pagnext\" href=\"".getEventURL($this->eventName,$this->evtp,$this->ctrl,$this->extra.$next,$this->baseName,$this->sesID)."\">Next</a>";    
}
}

if($blnStartP && $blnEndP){
$strout = '';
}else{
$strlink = $strlinkP . $strlinkN ;
$this->buttonnext = $strlinkN;
$this->buttonprev = $strlinkP;
$this->links = $lynx;
if($strlink!=''){
$strout = '<div class="pagbar"><div class="pagnums">&nbsp; '.$lynx.'</div>
<div class="pagprevnext">'.
$strlink .$edt.$del.'
</div></div>
<div style="clear:both"></div>';
}
}
return $strout;
}

public function oncreate($element){
//$this->strFormat = $element->innertext;
    if($element->innertext != ""){
        $this->strFormat = "datajfjfh";
    }
//$element->innertext = '';
}

public function startAJAX(){
$opendlg = "";
if($this->blndlg){
addHeaderJSFunctionCode('ready',$this->name,'
jql("#'.$this->name.'_dlg").dialog({
autoOpen: false,
width: "auto",
height: "700",
show: {
        effect: "blind",
        duration: 1000
},
hide: {
        effect: "explode",
        duration: 1000
},
position: [10,10],
title: "Grid Editor Form",
create: function(event, ui) { 
      var widget = $(this).dialog("widget");
      $(".ui-dialog-titlebar-close", widget)
          .html(\'<span class="ui-button-icon ui-icon ui-icon-closethick"></span><span class="ui-button-icon-space"> </span>\')
          .addClass("ui-button ui-corner-all ui-widget ui-button-icon-only ui-dialog-titlebar-close");
   },
closeText: "",
modal: true,
beforeClose: function(){
    $("#'.$this->name.'_editor").html("");
}
    });
');
    addHeaderCSS('dragdrop', '
.dragdrop
{
position: relative; 
cursor: auto;
}
');
$opendlg = "jql(\"#". $this->name ."_dlg\").dialog(\"open\");";
}

if($this->blnajax){
$jsAjax = "true";    
}else{
$jsAjax = "false";        
}
addHeaderJSCode($this->name,"
window['confirmDel_$this->name'] = function (link){
confirmDel(link,$jsAjax);
        };    
window['pagiedit_$this->name'] = function (link){
$opendlg
pagiedit(link,$jsAjax);
        };    
window['paginew_$this->name'] = function (link){
$opendlg
pagiedit(link,$jsAjax);
        };    
");
    addHeaderJSCode('pagi',"
function confirmDel(link,jsajax){
var ans = confirm('Are You Sure to Delete This Record !') ;
if(ans){
if(jsajax){
getURL(link);
 }else{
window.location = link ; 
  }
}
}
function pagiedit(link,jsajax) {
if(jsajax){
getURL(link);
 }else{
window.location = link ; 
  }
return false;
	}
function paginew(link,jsajax){
if(jsajax){
getURL(link);
 }else{
window.location = link ; 
  }
}
");


$ptag = '<div id="'.$this->name.'_dlg" class="dragdrop">
<div id="'.$this->name.'_editor" style="width:100%;height:100%;"></div>    
</div><div id="'.$this->name.'_toolbar" class="padding-bottom padding-top">';
if($this->blnadd){
$ptag .= '<button class="btn btn-primary" onclick="paginew_'.$this->name.'(\''.getEventURL($this->name.'_newa','','','','',true).'\');" >Add</button>';
}
    $divt = "$ptag</div><div id=\"{$this->name}_list\">";     
    $this->setPreTag($divt.$this->getPreTag());    
    $this->setPostTag('</div>'.$this->getPostTag());
    
}


public function onjsrender(){
$JSServer = SphpBase::JSServer();
$opendlg = "";
if(!$JSServer->ajaxrender){
if($this->blnajax){
$this->eventName = $this->name."_show";
$this->editeventName = $this->name."_view";
$this->deleventName = $this->name."_delete";
$this->startAJAX();
}else{
$jsAjax = "false";    
addHeaderJSCode($this->name,"
window['confirmDel_$this->name'] = function(link){
confirmDel(link,$jsAjax);
        };
window['pagiedit_$this->name'] = function (link){
$opendlg
pagiedit(link,$jsAjax);
        };
window['paginew_$this->name'] = function (link){
$opendlg
pagiedit(link,$jsAjax);
        };
");
    addHeaderJSCode('pagi',"
function confirmDel(link,jsajax){
var ans = confirm('Are You Sure to Delete This Record !') ;
if(ans){
if(jsajax){
getURL(link);
 }else{
window.location = link ; 
  }
}
}
function pagiedit(link,jsajax) {
if(jsajax){
getURL(link);
 }else{
window.location = link ; 
  }
return false;
	}
function paginew(link,jsajax){
if(jsajax){
getURL(link);
 }else{
window.location = link ; 
  }
}
");
}
}
}

public function onprerender(){
// set default values
$spt = explode(',', $this->dtable);
if(count($spt)>0){
    $idf = $spt[0].".id";
}else{
    $idf = "id";
}
if($this->pageCountSQL==''){
$this->pageCountSQL = "SELECT count($idf) FROM ".$this->dtable." ".$this->where;
}
if($this->sql==''){
$this->sql = "SELECT $idf,$this->fieldNames FROM ".$this->dtable." ".$this->where;
}

$this->parameterA['class'] = 'pag';
$this->innerHTML = $this->header. $this->executeSQL() . $this->footer;
//$this->innerHTML = $this->header.$this->footer;
//$this->unsetrender();
}

    public function onholder($obj) {
        switch($obj->tagName){
            case 'img':{
                if($this->row[$obj->getAttribute("dfield")] != ''){
                    $obj->setAttribute('src',$this->row[$obj->getAttribute("dfield")]);
                }else if($obj->hasAttribute('default')){
                    $obj->setAttribute('src',$obj->getAttribute('default'));                    
                }
                break;
            }default:{
                if($this->row[$obj->getAttribute("dfield")] != ''){
                    $obj->setInnerHTML($this->row[$obj->getAttribute("dfield")]);
                }else if($obj->hasAttribute('default')){
                    $obj->setInnerHTML($obj->getAttribute('default'));                    
                }
                break;
            }
        }
    }


}

}
