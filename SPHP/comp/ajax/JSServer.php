<?php 
/**
 * JSServer class
 *
 * This class create JSServer Object.
 * @author     Sartaj Singh
 * @copyright  2007
 * @version    4.0.0
 */
class JSServer{
/**
 * Class Constructor
 * This returns the JSServer class object. 
 * @return JSServer
 */
  public function __construct(){}
  /**
   * get AJAX Library if not set
   */
public function getAJAX(){}
/**
 * getJSON post via ajax 
 */
public function getJSON(){}
/**
 * Add JSON Block Data into JSON Server Response
 * @param String $sact Block Name
 * @param String $evtp Block Name Category
 * @param array $dataar Block Data
 * @example addJSONBlock("html","mytagid","This is server response");
 */
public function addJSONBlock($sact,$evtp,$dataar) {  }
/**
 * Add Component output to JSON Server Response
 * @param Control $obj Sartaj PHP Tag Component Object
 * @param String $outid Optional Default=outid Where Component HTML output display
 */
public function addJSONComp($obj,$outid='outid') { }
/**
 * Get Component HTML output with in AJAX environment
 * @param Control $obj
 * @return String Return Component OUTPUT 
 */
public function getJSONComp($obj) { }
/**
 * Add Temp File Object into JSON Server Response
 * @param TempFile $tempobj
 * @param String $outid Optional Output Display Tag ID 
 */
public function addJSONTemp($tempobj,$outid='outid') { }
/**
 * Add Temp File Object Full into JSON Server Response
 * @param TempFile $tempobj
 * @param String $outid Optional Output Display Tag ID 
 */
public function addJSONTempFull($tempobj,$outid='outid') { }
/**
 * Add JSON JS Block Data into JSON Server Response
 * @param array $jsdata Block Data
 * @example addJSONJSBlock("alert('hello');");
 */
public function addJSONJSBlock($jsdata='') { }
/**
 * Send ALL JSON Data response to Server 
 */
public function echoJSON(){}

} 

?>