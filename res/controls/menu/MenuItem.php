<?php
/**
 * Description of MenuItem
 *
 * @author SARTAJ
 */
include_once("{$libpath}tools/Control.php");


class MenuItem extends Control{

public function __construct($name='',$fieldName='',$tableName='') {
$this->init($name,$fieldName,$tableName);
$this->setHTMLName("");
$this->setHTMLID("");
}

public function onrender(){
global $JSServer,$blnAjaxLink;
$mnuitemhref = $this->parameterA['href'];
$mnuitemtext = $this->innerHTML;
//$this->setAttribute("class", "dropdown-item" . $this->getAttribute('class'));
$mnuitemtitle = $this->getAttribute('title');
if($mnuitemhref==''){
    $mnuitemhref = "#";
}else if($blnAjaxLink){
    $mnuitemhref = "javascript: menu_ajax('$mnuitemhref');";
}
$this->innerHTML = '<a class="dropdown-item" href="'.$mnuitemhref.'">'.$mnuitemtext.'</a>';
$this->tagName = "li";
}

}
?>