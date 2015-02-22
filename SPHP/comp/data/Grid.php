<?php
/**
 * Description of Grid
 *
 * @author SARTAJ
 */

class Grid extends Control{
public $pageNo = -1;
public $totalPages = 1;
public $perPageRows = 10;
public $sql = '';
public $pageCountSQL = '';
public $result;
public $row;
public $linkno = 10;
public $extraData = '';
public $strFormat = '';
public $fieldNames = '';
public $headNames = '';
public $colwidths = '';
public $where = '';
public $app = '';
public $blnEdit = false;
public $blnDelete = false;
public $cacheTime = 0;
/**
 * Create Grid Object
 * @global type $page
 * @global type $ctrl
 * @global type $tblName
 * @global type $JSServer
 * @param type $name
 * @param type $fieldName
 * @param type $tableName 
 * @return Grid
 */
public function __construct($name='',$fieldName='',$tableName='') {}
function handleEvents(){}
public function getEventPath($eventName, $evtp='', $ControllerName='', $extra='', $newBasePath='', $blnSesID=false){    }
public function setMsgName($val) {}
public function setSQL($sql){}
public function setPageCountSQL($sql){}
public function setPerPageRows($val){}
public function setExtraData($val){}
public function setPageNo($val){}
public function getPageNo(){}
public function setLinkNo($val){}
public function setCacheFile($val){}
public function setCacheSave(){}
public function setCacheKey($val){}
public function setCacheTime($val){}
public function setFieldNames($val){}
public function setHeaderNames($val){}
public function setColWidths($val){}
public function setWhere($val){}
public function setApp($val){}
public function setEdit(){}
public function setDelete(){}
public function getPageBar(){}
public function setHeader($val){}
public function setFooter($val){}
public function unsetDialog(){}
public function executeSQL(){}
public function startAJAX(){}
}
?>