<?php
/**
 * Description of MenuBar
 *
 * @author SARTAJ
 */
include_once("{$libpath}widgets/Control.php");
include_once("{$comppath}jquery.php");
$blnAjaxLink = false;

class MenuBar extends Control{

public function __construct($name='',$fieldName='',$tableName='') {
$this->init($name,$fieldName,$tableName);
$this->setHTMLName("");
$this->setHTMLID("");
}

public function onjsrender(){
addFileLink($this->pathres.'menu.css');
addFileLink($this->pathres.'menu.js');
}


public function onrender(){
$this->setPreTag('<div id="copyright" style="display:none;"><a href="http://apycom.com/"></a></div>
<div id="menu">');
$this->parameterA['class'] = "menu";
$this->tagName = "ul";
$this->setPostTag('</div>');
}

}

?>