<?php
/**
 * Description of textfield
 *
 * @author SARTAJ
 */

/**
 * Tag class
 *
 * This class provide infrastructure for HTML Tag Component. You can convert any Tag into Tag Component in Front File.
 * @author     Sartaj Singh
 * @copyright  2007
 * @version    4.0.0
 */
class Tag extends Control{
/**
 * Class Constructor
 * This returns the Tag class object. Leave $fieldName if you do not want bind component with database table field.
 * @param String $name id attribute in Front File Optional Unique Name
 * @param String $fieldName dfield attribute in Front File Optional Database binding Field Name
 * @param String $tableName dtable attribute in Front File Optional Database binding Table Name
 * @return Tag
 */
public function __construct($name='',$fieldName='',$tableName='') {}
/**
 * Return HTML Attribute Value of component
 * @param String $name
 * @return String 
 * @example echo $txt1->style
 */
function __get($name) { }
/**
 * Set Value HTML Attribute of component
 * @param String $name
 * @param String $value
 * @return String 
 * @example $txt1->style = "font-size:15px;"
 */
    function __set($name, $value) {  }
/**
 * Check If Attribute is set or not in HTML
 * @param String $name
 * @return boolean 
 */
    function __isset($name) {    }
    function __unset($name) {    }

// javascript functions
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
