 <?php
/**
 * Description of JQuery
 *
 * @author Sartaj Singh
 */
 
/**
 * JQuery class
 *
 * This class create JQuery Object for PHP.
 * @author     Sartaj Singh
 * @copyright  2007
 * @version    4.0.0
 */
class JQuery {
/**
 * Class Constructor
 * This returns the JQuery class object.
 * @return JQuery
 */

public function __construct() {}
/**
 * Set Output Function Name for Java Script Code
 * @param String $jsfun
 * @param boolean $funtype 
 */
public function setJSFunctionName($jsfun,$funtype=false){}
/**
 *  Strip Quotation marks in string data
 * @param String $jsfun
 * @return String
 */
public function stripQuot($val){}
/**
 *  Safe Java Script string Code
 * @param String $val JS Code
 * @return String
 */
public function safeJSString($val){}
/**
 * Strip New Line Chars
 * @param String $val JS Code
 * @return String
 */
public function stripNewLineChar($val){}
/**
 * Execute PHP Code and return JS statement + JS Flush Statement
 */
public function PHP($code){}
/**
 * Execute PHP Code and return JS statement Without JS Flush Statement
 */
public function PHPF($code){}
/**
 * Set Java Script Event Handler Function
 */
public function setEventHandler(){}
/**
 * Fetch SQL Query
 * @param String $sql SQL Query
 * @param int $timesec Cache Time in seconds
 * @return json data
 */
public function fetchQuery($sql,$timesec=0){}
/**
 * Post Data to Server via AJAX
 */
public function ajax($fun,$url,$data="''",$cache=false){}
/**
 * create Time Line Animation. Use For Create Animation. also view addTimeLineCMD()
 * @param String $aname JS Variable name
 * @return string JS Code
 */
public function StartTimeLine($aname){}
/**
 *
 * @param String $aname Unique Function Code Identifier
 * @param int $at_time time in miliseconds
 * @param String $val JS Code
 * @return string 
 */
public function addTimeLineCMD($aname,$at_time,$val){}
/**
 * Convert PHP Function into Java Script Function
 * @return String JS Function Code 
 */
public function fun(){}
/**
 * Convert PHP Function Arguments into Java Script Function Arguments
 * @return String JS Function Code 
 */
public function funargs(){}
/**
 * Run Time Line Animation
 * @param String $aname Time Line Variable Name for run
 * @return string JS Code
 */
public function runTimeLine($aname){}
/**
 * Create JQuery Queue
 * @param String $aname
 * @return string 
 */
public function Queue($aname){}
/**
 * Add Queue
 * @param String $aname
 * @param String $val JS Code process on next function call
 * @return String 
 */
public function addQueue($aname,$val){}
/**
 * Add JQuery Fade Effect on any HTML Tag ID
 * @param String $id HTML Tag ID
 * @return String JS Code 
 */
public function addFade($id){}
/**
 * Add JQuery Explode Effect on any HTML Tag ID
 * @param String $id HTML Tag ID
 * @return String JS Code 
 */
public function addExplode($id){}
/**
 * Add JQuery Bounce Effect on any HTML Tag ID
 * @param String $id HTML Tag ID
 * @return String JS Code 
 */
public function addBounce($id){}
/**
 * Set Event oriented Environment for work Client Side. This Function use so many JQuery Libraries.
 * You can use jq_drag,jq_drop,jq_resize,jq_keyevent,jq_focus event handler.
 * @global type $jquerypath
 * @global type $comppath 
 */
public function getJQKit(){}
/**
 * Fix PNG Look in IE 6.0
 * @global type $respath 
 */
public function pngFix(){}

}

class jq{
public function __construct() { }
public function get($strjquery){ }
/**
 * (SJS) Get URL for any type of Application Event
 * @param String $eventName
 * @return String url
  */
public function getEventPath($eventName, $evtp, $ControllerName, $extra, $newbasePath, $blnSesID){ }
/**
 * (SJS) Get URL for SJS Function
 * @param String $sjsfunctionname
 * @return String base of getEventPath function
  */
public function getSJSPath($evtp, $ControllerName, $extra, $newbasePath, $blnSesID){ }
public function __toString() { }
	}
$jq = new jq();

 class Eventer{
    public $obj="";
    public $evt="";
    public $event="";
    public $ui="";
public function __construct() { }
    
}
?>