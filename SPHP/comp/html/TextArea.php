<?php
/**
 * Description of textfield
 *
 * @author SARTAJ
 */
class TextArea extends Control{
public $maxLen = '';
public $minLen = '';
public $formName = '';
public function __construct($name='',$fieldName='',$tableName='') {}

     public function setForm($val) { }
     public function setMsgName($val) { }
     public function setRequired() {}
     public function setMaxLen($val){}
     public function getMaxLen() { }
     public function setMinLen($val){}
     public function getMinLen() {}
public function getJSValue(){
return "document.getElementById('$this->name').value" ;
}
public function setJSValue($exp){
return "document.getElementById('$this->name').value = $exp;" ;
}

}
?>