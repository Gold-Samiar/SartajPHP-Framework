<?php
/**
 * Description of Img
 *
 * @author SARTAJ
 */
class Img extends Control{

public function __construct($name='',$fieldName='',$tableName='') {}

// javascript functions used by ajax control and other control
public function getJSValue(){
return "document.getElementById('$this->name').value" ;
}

public function setJSValue($exp){
return "document.getElementById('$this->name').value = $exp;" ;
}

public function getJSSrc(){
return "document.getElementById('$this->name').src" ;
}

public function setJSSrc($exp){
return "document.getElementById('$this->name').src = $exp;" ;
}

}
?>