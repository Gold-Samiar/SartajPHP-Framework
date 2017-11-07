<?php
/**
 * Description of MenuLink
 *
 * @author SARTAJ
 */
include_once("{$libpath}tools/Control.php");


class MenuLink extends Control{
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
public function onrender(){
global $JSServer,$blnAjaxLink;
$href = $this->parameterA['href'];
$tit = $this->parameterA['caption'];
$this->parameterA = array();
if($href==''){
    $href = "#";
}else if($blnAjaxLink){
    $href = "javascript: menu_ajax('$href');";
}
if($this->getInnerHTML()==''){
$this->setInnerHTML('<a href="'.$href.'"><span>'.$tit.'</span></a>');
}
$this->tagName = "li";
}

}
?>