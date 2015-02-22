<?php
/**
 * Description of Ajaxsenddata
 *
 * @author SARTAJ
 */
$ajax = new Ajax();
/**
 * Ajaxsenddata class
 *
 * This class create Ajaxsenddata Component from Front File.
 * @author     Sartaj Singh
 * @copyright  2007
 * @version    4.0.0
 */
class Ajaxsenddata extends Control{
/**
 * Class Constructor
 * This returns the Ajaxsenddata class object. Leave $fieldName if you do not want bind component with database table field.
 * @param String $name id attribute in Front File Optional Unique Name
 * @param String $fieldName dfield attribute in Front File Optional Database binding Field Name
 * @param String $tableName dtable attribute in Front File Optional Database binding Table Name
 * @return Ajaxsenddata
 */
public function __construct($name='',$fieldName='',$tableName='') {}
/**
 * Set URL to Send Data Via AJAX
 * @param String $val 
 */
public function setURL($val) {}
/**
 * Set Data to send via AJAX
 * @param String $val 
 */
public function setData($val) { }
/**
 * Set Data From Components
 * @param String $val List of Component HTML ID to send Data via AJAX 
 */
public function setDataFromComps($val) { }
/**
 * Set HTML Output ID where AJAX output is Displayed.
 * @param String $val 
 */
public function setOutID($val) { }
/**
 * Set JS Event Handler on AJAX Data Receive
 * @param String $val 
 */
public function setOnReceive($val) { }
/**
 * Send AJAX Data Via Post Method 
 */
public function setMethodPost() { }
/**
 * Set MIME Type
 * @param String $val 
 */
public function setMIME($val) { }
/** 
 * Get JS Code of Call Function
 * @return String 
 */
public function call() { }
/**
 *
 * @param String $url
 * @param Object $data
 * @param String $cache false or true
 * @param String $dataType default=json
 * @return String 
 */
public function postData($url,$data,$cache='false',$dataType='json') { return "aj_$this->name('$url',$data,$cache,'$dataType');";}
/**
 *
 * @param String $sact
 * @param String $evtp
 * @param array $dataar 
 */
public function addJSONBlock($sact,$evtp,$dataar) {  }
/**
 * @param String $jsdata 
 */
public function addJSONJSBlock($jsdata='') {  }
public function echoJSON() {  }
/**
 * Return Java Script Code 
 */
public function getJSValue(){
return "document.getElementById('$this->name').value" ;
}
/**
 * Return Java Script Code 
 */
public function setJSValue($exp){
return "document.getElementById('$this->name').value = $exp;" ;
}

}


?>