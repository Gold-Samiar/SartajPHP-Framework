<?php
/**
 * Description of SearchQuery
 *
 * @author SARTAJ
 */
class SearchQuery extends Control{
public $sql = '';
public $strFormat = '';
public $result = '';
public $row = '';
public $cacheTime = 0;

public function __construct($name='',$fieldName='',$tableName='') {}
public function setSQL($val){}
public function setCacheTime($val){}
public function setCacheFile($val){}
public function setCacheSave(){}
public function setCacheKey($val){}

}
?>