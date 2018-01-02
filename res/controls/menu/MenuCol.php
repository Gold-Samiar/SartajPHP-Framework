<?php
/**
 * Description of MenuCol
 *
 * @author SARTAJ
 */



class MenuCol extends Control{
private $mnuSub = false;

public function __construct($name='',$fieldName='',$tableName='') {
$this->init($name,$fieldName,$tableName);
$this->setHTMLName("");
$this->setHTMLID("");
}
public function setAjaxMenu($outid){
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
$href = $this->getAttribute('href');
$tit = $this->getAttribute('caption');

if($href==''){
    $href = "#";
}else if($blnAjaxLink){
    $href = "javascript: menu_ajax('$href');";
}
if(!$this->mnuSub){
$this->preTag = '<li><a href="'.$href.'" class="parent"><span>'.$tit.'</span></a>';
}else{
$this->preTag = '<li><a href="'.$href.'" class="parent2">'.$tit.'</a>';    
}
$this->postTag = '</li>';
$this->tagName = "div";
}

}
?>