<?php 
/**
 * JSClient class
 *
 * This class create JSClient Object.
 * @author     Sartaj Singh
 * @copyright  2007
 * @version    4.0.0
 */
class JSClient{

/**
 * Class Constructor
 * This returns the JSClient class object. 
 * @return JSClient
 */
  public function __construct(){}
/**
 * Set the JSClient Object.
 */
public function start(){}
/**
 * Call Server via AJAX
 * @param String $jsfun JS Function Name
 * @param String $url Server URL Which is access via AJAX
 * @param String $imgid Optional Animated image id for show ajax processing
 * @return String JS Code 
 */
public function callServer($jsfun,$url,$imgid="''"){}
/**
 * Post Data on Server
 * @param String $url Server URL Which is access via AJAX
 * @param json $data Optional Data to Post Server
 * @param String $imgid Optional Animated image id for show ajax processing
 * @param boolean $cache Optional Default=false
 * @param String $dataType Optional Default=json
 * @return String JS Code 
 */
public function postServer($url,$data="{}",$imgid="''",$cache=false,$dataType="'json'"){}

} 
?>