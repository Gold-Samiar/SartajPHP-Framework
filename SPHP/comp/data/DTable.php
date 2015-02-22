<?php
/**
 * Description of DTable
 *
 * @author Sartaj
 */
class DTable  extends Control{
public $fields = array();
public $randerComp;


public function __construct($name='',$fieldName='',$tableName='') {}

public function setMsgName($val) {}
public function setApp($val){}
public function setForm($val){}
public function setField($dfield,$label='',$type='',$req='',$min='',$max=''){}
public function setDontUseFormat(){}
public function createComp($id,$path='',$class=''){}
public function genComp(){}
public function firecompcreate(){ }
public function genForm(){}

}
?>
