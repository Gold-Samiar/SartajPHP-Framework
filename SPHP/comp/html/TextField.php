<?php
/**
 * Description of textfield
 *
 * @author SARTAJ
 */
class TextField extends Control{
public $maxLen = '';
public $minLen = '';

public function __construct($name='',$fieldName='',$tableName='') {}

     public function setForm($val) { }
     public function setMsgName($val) { }
     public function setNumeric() { }
     public function setRequired() {}
     public function setEmail() { }
     public function setMaxLen($val){ }
     public function getMaxLen() { }
     public function setMinLen($val){ }
     public function getMinLen() { }
     public function setPassword() { }
     public function unsetPassword() { }
     public function getPassword() { }
     public function setReadOnly() { }
     public function unsetReadOnly() { }
     public function getReadOnly() { }

public function getJSValue(){
return "document.getElementById('$this->name').value" ;
}

public function setJSValue($exp){
return "document.getElementById('$this->name').value = $exp;" ;
}

}
?>