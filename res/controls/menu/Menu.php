<?php
/**
 * Description of Menu
 *
 * @author SARTAJ
 */
include_once("{$libpath}tools/Control.php");


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
$mnuhref = $this->parameterA['href'];
$mnutext = $this->getAttribute('caption');
$mnuclass = $this->getAttribute('class');
$mnutitle = $this->getAttribute('title');

$href = $this->getAttribute('href');
$tit = $this->getAttribute('caption');
$this->parameterA = array();
if($href==''){
    $href = "#";
}else if($blnAjaxLink){
    $href = "javascript: menu_ajax('$href');";
}
if(!$this->mnuSub){
$this->preTag = '<li><a href="'.$href.'" class="parent"><span>'.$tit.'</span></a><div>';
}else{
$this->preTag = '<li><a href="'.$href.'" class="parent2">'.$tit.'</a><div>';    
}
$this->postTag = '</div></li>';
$this->tagName = "ul";
}

}
?>