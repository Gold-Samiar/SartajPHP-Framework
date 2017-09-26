<?php
/**
 * @package SartajPHP
 * @category SPHP 
 */
/**
 *  Register Application to Run in registery file like reg.php or regapp.php
 * @var Array $controller
 * @example $controller['invest'] = "apps/invest_app.app";<br> 
 * registerApp("invest","apps/invest_app.app");
 */
$controller = array(); 
// collection of controls for server operation
/**
 * Collection of All Controls Exist in Current Application
 * @var Array $Components
 */
$Components = array(); 
/**
 * Generate Title Tag in master with getHeaderHTML() Function
 * @var String $title
 * @link http://www.sartajphp.com/
 */
$title = "";
/**
 * Generate Meta Tag in master with getHeaderHTML() Function
 * @var String $metakeywords
 */
$metakeywords = "";
/**
 * Return or set of Index of next keywords for SEO repeated in alt tag or other with  getKeyword() Function
 * @var int $keywordIndex
 */
$keywordIndex = -1;
/**
 * Keywords Array for SEO repeated in alt tag or other with  getKeyword() Function
 * @var array $keywords
 */
$keywords = array();
/**
 * index for autogenrated paragraph for repeated SEO keywords. use genAutoText() Function
 * @var int $paraIndex
 */
$paraIndex = 1;
/**
 * repeat number for autogenrated paragraph for repeated SEO keywords. use genAutoText() Function
 * @var int $paraRepeated
 */
$paraRepeated = 1;
/**
 * paragraph clips for autogenrated paragraph for repeated SEO keywords. use genAutoText() Function
 * @var array $para
 */
$para = array();
/**
 * Generate Meta Tag Description in master with getHeaderHTML() Function
 * @var String $metadescription
 */
$metadescription = "";
/**
 * Generate Meta Tag Distribution in master with getHeaderHTML() Function
 * @var String $metadistribution
 */
$metadistribution = "global";
/**
 * Generate Meta Tag Page Classification in master with getHeaderHTML() Function
 * @var String $metadistribution
 */
$metaclassification = "";
$metarobot = "index, follow";
$metarating = "general";
$metaauthor = "$basepath";
$metapagerank = "10";
$metarevisit = "5 days";
/**
 * Set Resource Root Path of Shared Folder for Project. This must be set in setg.php file in
 * project Root. Use This Path for java script files,css,images files in PHP code if you want your
 * files is only use from shared folder and not require to customization for particular project. If you want to give permission
 * for customization use $drespath variable to generate path.
 * @example $respath = "http://res.randhawatech.com/";
 * @var String $respath
 */
$respath = "";
/**
 * Set PHP Library Root Path of Shared Folder for Project. This must be set in setg.php file in
 * project Root. This path can be use for include PHP shared library files into project php file. If you
 * use this path to develop shared library files then that files can not shift into project folder. 
 * @example $phppath = "../res/";
 * @var String $phppath
 */
$phppath = "";
/**
 * Dynamic Resource Root Path of Shared Folder for Project. This is automatically set by SartajPHP Framework.
 * Use This Path for java script files,css,images files in PHP code if you want your
 * files can be customize and sift from shared folder to project folder without rewrite any URL.
 * @var String $drespath
 */
$drespath = "";
/**
 * Dynamic PHP Library Root Path of Shared Folder for Project. This is automatically set by SartajPHP Framework.
 * This path can be use for include PHP files into project php file. If you
 * Use This Path for include PHP files in PHP code if you want your
 * files can be customize and sift from shared folder to project folder without rewrite any URL.
 * @var String $dphppath
 */
$dphppath = "";

/**
 * Return Unique Session ID for Visitor.
 * @var String $sesID
 */
$sesID = "";
/**
 * Return Authenticate Type which is set by setSession() function for every Visitor.
 * @var String $logType
 */
$logType = "";
/**
 * Return Authenticate Unique ID which is set by setSession() function for every Visitor.
 * @var String $uid
 */
$uid = "";

/** 
 * @var mysql $mysql
 */
$mysql = new mysql() ;
/** 
 * @var HTMLParser $HTMLParser
 */
$HTMLParser = new HTMLParser();
/** 
 * Java Script Client for Browser Side JS Code
 * @var JSClient $JSClient
 */
$JSClient = new JSClient();
/** 
 * Java Script Server for Server Side JS Code
 * @var JSServer $JSServer
 */
$JSServer = new JSServer();
/** 
 * Jquery for Browser Side JS Code
 * @var JQuery $JQuery
 */
$JQuery = new JQuery();
/** 
 * Get mysql Object for Database Operations
 * @return mysql
 */
function getMySQLEngine(){
global $mysql;
    return $mysql;    
}
/** 
 * Get Java Script Client Object for Browser Operations
 * @return JSClient
 */
function getJSClient(){
global $JSClient;
    return $JSClient;    
}
/** 
 * Get Java Script Server Object for Browser Operations
 * @return JSServer
 */
function getJSServer(){
global $JSServer;
    return $JSServer;    
}
/** 
 * Get Jquery Object for Browser Operations
 * @return JQuery
 */
function getJQuery(){
global $JQuery;
    return $JQuery;    
}

/** 
 * Default Page Object to develop page application.
 * @var page $page
 */
$page = new page(); 
/** 
 * Get Default Page Object to develop page application.
 * @return page
 */
function getDefaultPageObject(){
global $page;
    return $page;    
}
/** 
 * Get Default Page Object to develop page application.
 * @return void
 */
function setDefaultPageObject($pageobject){
global $page;
$page = $pageobject;
}
/**
 * Register an Application With SartajPHP Framework
 * @param String $ctrl Controller Name
 * @param String $apppath Application File Path 
 * @example registerApp("index","apps/index.app");
 */
function registerApp($ctrl,$apppath){}
/**
 * Set Permission to Visitor for Application
 * @param String $logType 
 * @param String $uid 
 * @example setSession("ADMIN","bhupinder"); Now Authenticate Type = ADMIN and userID = bhupinder
 * we can check authentication before give permission to run page of application with function $page->Authenticate()
 */
function setSession($logType,$uid){}
/**
 * Set Dafult GUEST Permission to Visitor for Application
 * @example destSession(); Now Authenticate Type = GUEST and userID = ""
 * we can check authentication before give permission to run page of application with function $page->Authenticate()
 */
function destSession(){}
/**
 * Set Error Flag with Error Message
 * @param String $msg 
 */
function raiseError($msg){}
/**
 * Print String with <br> tag
 * @param String $str 
 */
function println($str){}
/**
 * Convert Boolean to int
 * @param bool $boolean 
 * @return int
 */
function boolToInt($boolean){}
/**
 * Convert Boolean to String Yes/No
 * @param bool $boolean 
 * @return String
 */
function boolToYesNo($boolean){}
/**
 * Convert Boolean to String true/false
 * @param bool $boolean 
 * @return String
 */
function boolToString($boolean){}
/**
 * Convert String to Boolean
 * @param String $str 
 * @return bool
 * @example stringToBool("true");
 */
function stringToBool($str){}
/**
 * Check if value exist in array or not. case insensitive
 * @param mixed $needle
 * @param array $haystack 
 * @return bool
 */
function in_arrayi($needle, $haystack) {}
/**
 * Change Case of all values in Array
 * @param array $arr
 * @param int $case CASE_LOWER,CASE_UPPER
 * @return array
 */
function array_change_val_case($arr,$case=CASE_LOWER) {}
/**
 * Find value from array and return key if successful. case insensitive
 * @param mixed $needle
 * @param array $haystack 
 * @return mixed
 */
function array_search_i($needle, $haystack) {}
/**
 * Return IP Value of Client
 * @return String <br>
 * @author Sartaj Singh 
 *
 */
function getIP() {}
/**
 * Return Client Details IP, Request method, url,protocol,referer,browser
 * @return array <br>
 * $ret = getGuestDetails();
 * echo $ret['ip']; <br>
 * echo $ret['method'] ;<br>
 * echo  $ret['uri'] ;<br>
 *  echo $ret['protocol'];<br>
 * echo  $ret['referer'] ;<br>
 * echo  $ret['agent'] ;<br>
 * @author Sartaj Singh 
 *
 */
function getGuestDetails(){}
/**
 * Return Client location: city country
 * @return array <br>
 * echo $ipDetail['city'];<br>
 * echo $ipDetail['country'];<br>
 * echo $ipDetail['country_code'];<br>
 * This function use http://hostip.info/ website api for conversion
 * @author Sartaj Singh 
 *
 */
function getIPDetail(){}
/**
 * Check Number in String or numeric variable is valid or not
 * @param mixed $val
 * @param String $datatype INT,FLOAT,DOUBLE
 * @return bool
 */
function is_valid_num($val,$datatype){}
/**
 * Check Email Address is in Valid Format or not
 * @param String $email 
 * @return bool
 */
function is_valid_email($email){}
/**
 * Generate Java Script Array Code from a PHP Array
 * @param String $jsVarName
 * @param array $phpArray 
 * @return String
 */
function getJSArray($jsVarName,$phpArray){}
/**
 * Generate Java Script Associative Array Code from a PHP Array
 * @param String $jsVarName
 * @param array $phpArray 
 * @return String
 */
function getJSArrayAss($jsVarName,$phpArray){}
function myErrorHandler($errno, $errstr, $errfile, $errline){}
function exception_handler($exception) {}
/**
 * Insert Resource File Link to HTML Output
 * @param String $fileURL
 * @param bool $randeronce Optional if true file will not add on AJAX request
 * @example addFileLink("{$respath}style/framework.css");
 */
function addFileLink($fileURL,$randeronce=false){}
/**
 * Remove Resource File Link from HTML Output
 * @param String $fileURL
 * @param bool $randeronce Optional if true file will not add on AJAX request
 * @example removeFileLink("{$respath}style/framework.css");
 */
function removeFileLink($fileURL,$randeronce=false){}
/**
 * Insert Customize Code into HTML Output
 * @param String $name Unique Name
 * @param String $code HTML Code
 * @param bool $randeronce Optional if true code will not add on AJAX request
 */
function addFileLinkCode($name,$code,$randeronce=false){}
/**
 * Check is File Link is added into HTML output Code or not.
 * @param String $filename
 * @param String $ext
 * @param bool $randeronce Optional if true code will not add on AJAX request
 * @return bool
 * @example issetFileLink("jquery","js",true);
 */
function issetFileLink($filename,$ext,$randeronce=false){}
/**
 * Insert Java Script Function into HTML Header Section
 * @param String $funname must be unique name
 * @param String $startcode
 * @param String $endcode
 * @param bool $randeronce Optional if true code will not add on AJAX request
 * @example addHeaderJSFunction('ready', "$(document).ready(function() {", "});");
 * addHeaderJSFunction('getName', "function getName(val) {", "}");
 */
function addHeaderJSFunction($funname,$startcode,$endcode,$randeronce=false){}
/**
 * Insert Java Script Function into HTML Footer Section
 * @param String $funname must be unique name
 * @param String $startcode
 * @param String $endcode
 * @param bool $randeronce Optional if true code will not add on AJAX request
 * @example addFooterJSFunction('ready', "$(document).ready(function() {", "});");
 * addFooterJSFunction('getName', "function getName(val) {", "}",true);
 */
function addFooterJSFunction($funname,$startcode,$endcode,$randeronce=false){}
/**
 * Insert Java Script Code Into Java Script Function generate in HTML Header Section.<br>
 * funname should be created otherwise this code can not generate any HTML output.
 * @param String $funname
 * @param String $name must be unique
 * @param String $code
 * @param bool $randeronce Optional if true code will not add on AJAX request
 * @example addHeaderJSFunctionCode('ready','mycode', "alert('hello');");
 */
function addHeaderJSFunctionCode($funname,$name,$code,$randeronce=false){}
/**
 * Insert Java Script Code Into Java Script Function generate in HTML Footer Section.<br>
 * funname should be created, otherwise this code can not generate any HTML output.
 * @param String $funname
 * @param String $name must be unique
 * @param String $code
 * @param bool $randeronce Optional if true code will not add on AJAX request
 * @example addHeaderJSFunctionCode('ready','mycode', "alert('hello');");
 */
function addFooterJSFunctionCode($funname,$name,$code,$randeronce=false){}
/**
 * Insert Java Script Code Into HTML Header Section.<br>
 * @param String $name must be unique
 * @param String $code
 * @param bool $randeronce Optional if true code will not add on AJAX request
 * @example addHeaderJSCode('ready',"alert('hello');");
 */
function addHeaderJSCode($name,$code,$randeronce=false){}
/**
 * Insert CSS Code Into HTML Header Section.<br>
 * @param String $name must be unique
 * @param String $code
 * @param bool $randeronce Optional if true code will not add on AJAX request
 * @example addHeaderCSS('ready',".textsize{font-size: 14px;}");
 */
function addHeaderCSS($name,$code,$randeronce=false){}
/**
 * Insert Java Script Code Into HTML Footer Section.<br>
 * @param String $name must be unique
 * @param String $code
 * @param bool $randeronce Optional if true code will not add on AJAX request
 * @example addFooterJSCode('ready',"alert('hello');");
 */
function addFooterJSCode($name,$code,$randeronce=false){}
/**
 * When Call every time return single <b>Keyword</b> from keywords Stack and increment keyword pointer
 * in keywords Stack.
 * @return String
 */
function getKeyword(){}
/**
 * Generate Text From $para and $keywords array for highlight the text keywords in content.
 * @return String
 */
function genAutoText(){}
/**
 * Generate HTML output in Master
 * @param bool $htmltag = true Optional
 * @param bool $global = true Optional
 * @return String
 */
function getHeaderHTML($htmltag=true,$global=true){}
/**
 * Generate HTML output in Master
 * @param bool $htmltag = true Optional
 * @param bool $global = true Optional
 * @return String
 */
function getFooterHTML($htmltag=true,$global=true){}
/**
 * This Function trace all Normal Error in SartajPHP Framework which is set by setErr() function. 
 * Generate Java Script Tag output. if $blnDontJS = true then it generate text output.
 * @param bool $blnDontJS = false Optional
 * @return String
 */
function traceError($blnDontJS=false){}
/**
 * Create an Error and set Message
 * @param String $name must be unique or otherwise overwrite the old Error
 * @param String $msg 
 */
function setErr($name,$msg){}
/**
 * Check any Internal or External Error. Return True if error create in processing.
 * @return bool 
 * @example if(!getCheckErr()){<br>
 * $page->insertData();<br>
 * }
 */
function getCheckErr(){}
/**
 * Clear any Internal or External Error.
 */
function unsetCheckErr(){}
/**
 * Return Error Message
 * @param String $name 
 */
function getErrMsg($name){}
/**
 * This Function trace all Messages in SartajPHP Framework which is set by setMsg() function. 
 * Generate Java Script Tag output. if $blnDontJS = true then it generate text output.
 * @param bool $blnDontJS = false Optional
 * @return String
 */
function traceMsg($blnDontJS=false){}
/**
 * Create Message for communication with user or internal objects
 * @param String $name must be unique or otherwise overwrite the old Message
 * @param String $msg 
 */
function setMsg($name,$msg){}
/**
 * Return Message
 * @param String $name 
 */
function getMsg($name){}
/**
 * This Function trace all Inner Error in SartajPHP Framework which is set by setErrInner() function. 
 * Generate Java Script Tag output. if $blnDontJS = true then it generate text output.
 * @param bool $blnDontJS = false Optional
 * @return String
 */
function traceErrorInner($blnDontJS=false){}
/**
 * Create an Inner Error and set Message. Inner Error use for critical error which can not require to
 * show normal user.
 * @param String $name must be unique or otherwise overwrite the old Error
 * @param String $msg 
 */
function setErrInner($name,$msg){}
/**
 * Return Inner Error Message
 * @param String $name 
 */
function getErrMsgInner($name){}
/**
 * FrontPlace class
 * This Class Create Dynamic Place in Master From any Front File.
 * @author     Sartaj Singh
 * @copyright  2007
 * @version    4.0.0
 */
class FrontPlace{
/**
     * Class Constructor
     * This returns the FrontPlace class object
     * @param String $frontname Unique Identifier
     * @param String $filepath Front File Path
 * @param String $secname Optional Default Section is left
 * @param String $type Optional TempFile,PHP or FrontFile Default = TempFile
     * @return FrontPlace
     */
public function __construct($frontname,$filepath,$secname='left',$type='TempFile') {}
/**
 * Process The Front File 
 */
    public function run(){}
/**
 * Get the HTML Output
 * @return String 
 */
    public function rander(){}
    } // end of frontplace class
/**
 * Reserve the Front Place Name and Front File Path for Dynamic Place in Master File. This function
 * must be call before addFrontPlace() Function for proper working. This function only will call if you want
 * to rewrite Front File Path for Front Place. Remember Front File should have extention .front only not .php.
 * @param String $frontname Unique Identifier
 * @param String $basepath filepath or folderpath
 * @param String $secname Optional Default Section is left
 * @param String $type Optional TempFile,PHP or FrontFile Default = TempFile
 */
function setFrontPlacePath($frontname,$basepath,$secname='left',$type='TempFile'){}
/**
 * Remove Front Place
 * @param String $frontname Unique Identifier
 * @param String $secname Optional Default Section is left
 */
function removeFrontPlace($frontname,$secname='left'){}
/**
 * Create Object of Front File for Dynamic Place in Master File. Remember Front File should have extention .front only not .php.
 * <p>This function behave diffirent if setFrontPlacePath() is called. If you set folderpath in setFrontPlacePath()
 * Then $filepath use for only take file name. But if you gave filepath then $filepath has no impact on Front File path. 
 * If You are not setFrontPlacePath() then $filepath will give the Front File Path</p>
 * @param String $frontname Unique Identifier
 * @param String $filepath
 * @param String $secname Optional Default Section is left
 * @param String $type Optional TempFile,PHP or FrontFile Default = TempFile
 */
function addFrontPlace($frontname,$filepath="",$secname='left',$type='TempFile'){}
/**
 * Return Front Place Object
 * @param String $frontname Unique Identifier
 * @param String $secname Optional Default Section is left
 * @return FrontPlace
 */
function getFrontPlace($frontname,$secname='left'){}
/**
 * Run Front Place Object
 * @param String $frontname Unique Identifier
 * @param String $secname Optional Default Section is left
 */
function runFrontPlace($frontname,$secname='left'){}
/**
 * Get HTML Output from Front Place Object
 * @param String $frontname Unique Identifier
 * @param String $secname Optional Default Section is left
 * @return String
 */
function randerFrontPlace($frontname,$secname='left'){}
/**
 * Run All Front Place Objects in Section
 * @param String $secname Optional Default Section is left
 */
function runFrontSection($secname='left'){}
/**
 * Run All Front Place Objects in Section and if any of Front File is not loaded into memory then
 * load into memory before Run.
 * @param String $secname Optional Default Section is left
 */
function addrunFrontSection($secname='left'){}
/**
 * List All Front Place Objects which is in running State but not rander in master.
 * @param String $secname Optional Default Section is left
 */
function ListNotRanderFrontSection($secname='left'){}
/**
 * Get HTML Output from Front Place Objects in one section.
 * @param String $secname Optional Default Section is left
 * @return String
 */
function randerFrontSection($secname='left'){}
/**
 * Encrypt String
 * @param String $string
 * @param String $key 
 * @return String
 */
function encrypt($string,$key="") {}
/**
 * Decrypt String which Encrypt by encrypt() function
 * @param String $string
 * @param String $key 
 * @return String
 * @example decrypt("tgdf","r203");
 */
function decrypt($string,$key="") {}
/**
 * Encode String
 * @param String $string
 * @param String $key 
 * @return String
 */
function endec($str,$ky=''){}
/**
 * Add Cache List
 * @param String $url only url hint like index
 * @param int $sec Optional Cache Time in Seconds
 * @param String $type Optional Default = controller
 * type = controller mean url has controller name only and response to all events basis on this controller
 * type = ce mean controller-event cache only that event
 * type = cep mean controller-event-evtp cashe only that event with that parameter
 * type = e event on any application will be cash
 * $type is automatically converted according to $url
 * @example addCashList("index",300); cache for 300 second all page related to controller index<br>
 * addCashList("index-info",300); cache for 300 second all page related to controller index and event info<br>
 */
function addCashList($url,$sec=0,$type='controller'){}
/**
 * Convert String into SartajPHP URL Safe String
 * @param String $val
 * @return String SartajPHP URL Safe String
 */
function getURLSafe($val){}
/**
 * Convert SartajPHP URL Safe String into String
 * @param String $val SartajPHP URL Safe String
 * @return String
 */
function getURLSafeRet($val){}
/**
 * Get Application SartajPHP URL
 * @param String $ControllerName Register Controller
 * @param String $extra Optional
 * @param String $newbasePath Optional
 * @param bool $blnSesID Optional URL is Session Secure Default = false
 * @return String SartajPHP URL 
 * @example echo getAppPath("index","myvar=kuljinder&myvar2=simranpreet","",true);<br>
 * echo getAppPath("index");
 */
function getAppPath($ControllerName,$extra='',$newbasePath='',$blnSesID=false){}
/**
 * Get Current Application SartajPHP URL
 * @param String $extra Optional
 * @param bool $blnSesID Optional URL is Session Secure Default = false
 * @return String SartajPHP URL 
 * @example echo getThisPath("myvar=kuljinder&myvar2=simranpreet",true);<br>
 * echo getThisPath();
 */
function getThisPath($extra='',$blnSesID=false){}
/**
 * Get Event of Application SartajPHP URL
 * @param String $eventName
 * @param String $evtp Optional
 * @param String $ControllerName Optional Default = Current Application Controller
 * @param String $extra Optional
 * @param String $newbasePath Optional
 * @param bool $blnSesID Optional Default = false
 * @return String SartajPHP URL 
 * @example echo getEventPath("info","form1","index","myvar=kuljinder&myvar2=simranpreet","",true);<br>
 * echo getEventPath("info");
 */
function getEventPath($eventName,$evtp='',$ControllerName='',$extra='',$newbasePath='',$blnSesID=false){}
/**
 * Escape Tag in Post Data
 * @param String $string
 * @return String Safe String 
 */
function escapetag($string){}

/**
 * Client Data Handling Class
 * @return Client 
 */
class Client{
/**
 * Client Get Header Data Reader/Writer
 * @param String $name
 * @param String $value
 * @return String 
 */
public function get($name,$value=null){}
/**
 * Client Post Header Data Reader/Writer
 * @param String $name
 * @param String $value
 * @return String 
 */
public function post($name,$value=null){}
/**
 * Client Request Data Reader/Writer
 * @param String $name
 * @param String $value
 * @return String 
 */
public function request($name,$value=null){  }
/**
 * Client Cookie Data Reader/Writer
 * @param String $name
 * @param String $value
 * @return String 
 */
public function cookie($name,$value=null){ }
/**
 * Client Session Data Reader/Writer
 * @param String $name
 * @param String $value
 * @return String 
 */
public function session($name,$value=null){ }
/**
 * Client-Server Data Reader/Writer
 * @param String $name
 * @param String $value
 * @return String 
 */
public function server($name,$value=null){ }
/**
 * Client Upload Files Data Reader/Writer
 * @param String $name
 * @param String $value
 * @return Object 
 */
public function files($name,$value=null){ }
     }
$Client = new Client();
/** 
 * Get Default Client Object.
 * @return Client
 */
function getClientObject(){
global $Client;
    return $Client;    
}


?>