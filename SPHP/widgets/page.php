<?php
/**
 * page class
 *
 * This class is parent class of all page application. You can Develop SartajPHP Application with extend
 * of this class or simple use getDefaultPageObject() function to implement page object in any php module.
 * 
 * @author     Sartaj Singh
 * @copyright  2007
 * @version    4.0.0
 */
class page
{
/** @var bool Authentication Flag Status */
public $authentication = false ;
/** @var bool Form Submit Event Flag Status */
public $issubmit = false;
/** @var bool View Event Flag Status */
public $isview = false;
/** @var bool New Event Flag Status */
public $isnew = false;
/** @var bool Delete Event Flag Status */
public $isdelete = false;
/** @var bool Form Insert Flag Status */
public $isinsert = false;
/** @var bool Form Update Flag Status */
public $isupdate = false;
/** @var bool Action Flag Status */
public $isaction = false;
/** @var bool User Defined Event Flag Status */
public $isevent = false;
/** @var bool Session Security Flag Status */
public $isSesSecure = false;
/** @var String Action Value*/
public $act = "" ;
/** @var String Event Flag Value */
public $sact = "" ;
/** @var String Event Parameter */
public $evtp = "" ;

/**
     * Class Constructor
     * This returns the page class object
     * @return page
     */
     public function __construct()
     {     }
/**
 * Page init Event Handler
 * @abstract 
 */
public function page_init(){}
/**
 * Page load Event Handler
 * @abstract 
 */
public function page_load(){}
/**
 * Page User Defined Event Handler
 * @abstract 
 */
public function page_event($event, $evtp){}
/**
 * Page action Event Handler
 * @abstract 
 */
public function page_action($act,$event, $evtp){}
/**
 * Page delete Event Handler
 * @abstract 
 */
public function page_delete(){}
/**
 * Page view Event Handler
 * @abstract 
 */
public function page_view(){}
/**
 * Page submit Event Handler
 * @abstract 
 */
public function page_submit(){}
/**
 * Page insert Event Handler
 * @abstract 
 */
public function page_insert(){}
/**
 * Page update Event Handler
 * @abstract 
 */
public function page_update(){}
/**
 * Page new Event Handler
 * @abstract 
 */
public function page_new(){}
/**
 * Page unload Event Handler
 * @abstract 
 */
public function page_unload(){}
/**
 * Return User Defined Event Name
 * @return String
 */
public function getEvent(){}
/**
 * Return Event Parameter
 * @return String
 */
public function getEventParameter(){}
/**
 * Check User has permission according to $auth variable. If user has not permission for application then it will
 * transfer user to getWelcome() function in comp.php file in project Root.
 * @example $auth = "AGENT,GUEST"; $page->Authenticate();
 */
public function Authenticate(){}
/**
 * Check User has permission according to JAVAFX state. 
 * @example $auth = "AGENT,GUEST"; $page->AuthenticateJFX();
 */
public function AuthenticateJFX(){}
/**
 * Return who is online GUEST or ADMIN or any other according to setSession() Function
 * @example $page->AuthenticateType();
 */
public function getAuthenticateType(){}
/**
 * Check Request URI has session security parameter or not.If URI has not permission for application then it will
 * transfer user to getWelcome() function in comp.php file in project Root.
 * Application is only accessible with ses secure URL.
 */
public function sesSecure(){}
/**
 * Transfer the user to any another URL
 * @param String $loc 
 * @example $page->forward(getAppPath("index")); $page->forward("http://www.google.com");
 */
public function forward($loc){}
public function setDBServer($db){}

/**
 * This Function delete the record of database table.
 * This Delete a record of table according to evtp as record id.<br>
 *
 */
public function deleteRec(){}

/**
 * When Components use Database Binding. Then This Function insert the values to database table from a
 * component value. This insert a new record in table.<br>
 *@param array $extra Otional
 * @example $extra[]['spcmpid'] = "mycompany"; <br> 
 * $extra['tbl_users']['userid'] = "rahul"; <br>
 * $page->insertData($extra);
 */
public function insertData($extra=array()){}

/**
 * When Components use Database Binding. Then This Function Fill the values from database table to a
 * component value.<br>
 * <strong>Example:-</strong><br>
 * // fill record number according to the value of $txtid variable from table and if any component<br>
 * bind with that field the value<br> is automatically displayed in that component.<br>
 * $page->viewData();<br>
 * // you can chenge default sql statements<br>
 * // Default $sql = "SELECT * FROM $tbln WHERE ID=$recID"<br>
 * changeable $sql = "SELECT $fldList FROM $tbln $where"<br>
 * $page->viewData(,,"WHERE id='1'");<br>
 * $page->viewData('','aname,pass,lst',"WHERE lastname='singh'");<br>
 * @param String $recID Optional,String $fldList Optional,String $where Optional
 *
 */
public function viewData($form,$recID='',$fldList='',$where=''){}

/**
 * When Components use Database Binding. Then This Function Update the values to database<br> table from a
 * component value. This update old record in table.<br>
 * @param String $recID Optional,String $where Optional
 */
public function updateData($extra=array(),$recID='',$where=''){}
}

?>