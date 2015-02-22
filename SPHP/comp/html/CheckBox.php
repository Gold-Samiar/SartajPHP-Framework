<?php
/**
 * Description of CheckBox
 *
 * @author SARTAJ
 */

/**
 * CheckBox class
 *
 * This class create HTML CheckBox Component from Front File.
 * @author     Sartaj Singh
 * @copyright  2007
 * @version    4.0.0
 */
class CheckBox extends Control{

/**
 * Class Constructor
 * This returns the CheckBox class object. Leave $fieldName if you do not want bind component with database table field.
 * @param String $name id attribute in Front File Optional Unique Name
 * @param String $fieldName dfield attribute in Front File Optional Database binding Field Name
 * @param String $tableName dtable attribute in Front File Optional Database binding Table Name
 * @return CheckBox
 */
public function __construct($name='',$fieldName='',$tableName='') {}
/**
 * Set HTML Form ID for client side validation
 * @param String $val 
 */
     public function setForm($val) {}
/**
 * Set Name in Message of Java Script Validation.
 * @param String $val 
 */
     public function setMsgName($val) { }
 /**
  * Set Required Validation. This Component must be fill. 
  */
     public function setRequired() {}

/**
 * Return Java Script Code 
 */
public function getJSValue(){}
/**
 * Return Java Script Code 
 */
public function setJSValue($exp){}


}
?>