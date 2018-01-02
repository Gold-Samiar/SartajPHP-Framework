<?php
/**
 * Description of Menu
 *
 * @author SARTAJ
 */
namespace{
class Menu extends Control{
private $mnuSub = false;

public function __construct($name='',$fieldName='',$tableName='') {
$this->init($name,$fieldName,$tableName);
$this->setHTMLName("");
$this->setHTMLID("");
}
public function setAjax($outid){
global $JSServer,$blnAjaxLink;
$blnAjaxLink = true;
$JSServer->getAJAX();
addHeaderJSFunction('menu_ajax', "function menu_ajax(url){
getURL(url);
", "}");
}
public function setSub(){
    $this->mnuSub = true;
}
public function onrender(){
global $JSServer,$blnAjaxLink;
$mnuhref = $this->getAttribute('href');
$mnutext = $this->getAttribute('caption');
$mnutitle = $this->getAttribute('title');

$href = $this->getAttribute('href');
$tit = $this->getAttribute('caption');
$this->parameterA = array();
$this->setAttribute('class',"dropdown-menu");
if($href==''){
    $href = "#";
}else if($blnAjaxLink){
    $href = "javascript: menu_ajax('$href');";
}
if(!$this->mnuSub){
$this->setPreTag('<li class="nav-item dropdown nav-dli"><a class="nav-link dropdown-toggle nav-dlink" data-toggle="dropdown" href="'.$href.'" >'.$tit.'</a>');
$this->setPostTag('</li>');
$this->tagName = "ul";
}else{
$this->setPreTag('<li class="dropdown-submenu nav-dli"><a class="dropdown-item dropdown-toggle nav-dlink" data-toggle="dropdown" href="'.$href.'" >'.$tit.'</a>');    
$this->setPostTag('</li>');
$this->setAttribute('class',"dropdown-menu");
$this->tagName = "ul";
}
}

}

}
