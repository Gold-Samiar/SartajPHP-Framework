<?php
/**
 * Description of MenuColItem
 *
 * @author SARTAJ
 */
include_once("{$libpath}widgets/Control.php");


class MenuColItem extends Control{

public function __construct($name='',$fieldName='',$tableName='') {
$this->init($name,$fieldName,$tableName);
$this->setHTMLName("");
$this->setHTMLID("");
}

public function onrender(){
$this->tagName = "ul";
}

}
?>