<?php
/**
 * Description of ajax
 *
 * @author SARTAJ
 */

/**
 * Ajax class
 *
 * This class create AJAX interface for PHP.
 * @author     Sartaj Singh
 * @copyright  2007
 * @version    4.0.0
 */
class Ajax {

/**
 * Class Constructor
 * This returns the Ajax class object.
 * @return Ajax
 */
public function __construct(){}
/**
 * Post Data via Ajax
 * @param String $url
 * @param String $outputID Tag ID where output show
 * @param String $showObj Animation ID
 * @param array $flds Data to send
 * @param String $MIMEType mime type
 * @param boolean $data other data to send
 * @return String 
 */
public function postDataAjax($url, $outputID,$showObj='',$flds=Array(),$MIMEType='',$data=false){}
/**
 * Get Data via Ajax to server
 * @param String $url
 * @param String $outputID Tag ID where output show
 * @param String $showObj Animation ID
 */
public function getDataAjax($url, $outputID,$showObj=''){}


}
?>