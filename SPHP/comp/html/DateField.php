<?php
/**
 * Description of DateField
 *
 * @author SARTAJ
 */
class DateField extends Control{
public $datemin = '';
public $datemax = '';

public function __construct($name='',$fieldName='',$tableName='') {}

     public function setForm($val) { }
     public function setMsgName($val) { }
     public function setRequired() {}
public function createDate($dformat, $beginDate, $outformat, $offsetd, $offsetm, $offsety){ }
public function mysqlDateToDate($df){}
public function setDateMin($val){}
public function setDateMax($val){}
public function setAppendText($val){}
public function setButtonImage($val){}
public function setNumMonths($val){}
public function getJSValue(){
return "document.getElementById('$this->name').value" ;
}
public function setJSValue($exp){
global $jsOut;
$jsOut .= "document.getElementById('$this->name').value = $exp;" ;
}

}
?>