<?php
/**
 * TempFile class
 *
 * This class provide infrastructure for Front File. This create a Template object from Front File.
 * @author     Sartaj Singh
 * @copyright  2007
 * @version    4.0.0
 */
class TempFile{
/** @var String $data */
public $data = '';
/** @var array $compList */
public $compList = array();
/**
 * Class Constructor
 * This returns the TempFile class object
 * @param String $TempFilePath Front File Path or String Data Code
 * @param bool $blnStringData Default= false If true then $TempFilePath use as String Data rather then File Path
 * @return TempFile
 */
public function __construct($TempFilePath,$blnStringData=false){}
/**
 * Overwrite TempFile Object with another Front File. This returns the TempFile class object
 * @param String $TempFilePath Front File Path or String Data Code
 * @param bool $blnStringData Default= false If true then $TempFilePath use as String Data rather then File Path
 * @return TempFile
 */
public function getFile($TempFilePath,$blnStringData=false){}
/**
 * Push the TempFile Object in Running State 
 */
    public function run(){    }
/**
 * echo HTML Output 
 */
    public function rander(){    }

}
/**
 * Front class
 *
 * This class provide infrastructure for Front File. This create a Front Design object and BackEnd Object for dynamic code.
 * This provide Inbuilt AJAX Structure to develop Software more easily.
 * @author     Sartaj Singh
 * @copyright  2007
 * @version    4.0.0
 */
class Front{
/** @var String $data */
public $data = '';
/** @var array $compList */
public $compList = array();

/**
 * Class Constructor
 * This returns the Front class object. There two files use to create Front Object. For example: <br>
 * $frt1 = new Front("forms/myform1.front");<br>
 * then other file back_myform1.back or back_main.back should also available on same path.
 * @param String $TempFilePath Front File Path or String Data Code
 * @param bool $blnStringData Default= false If true then $TempFilePath use as String Data rather then File Path
 * @return Front
 */
public function __construct($TempFilePath,$blnStringData=false){}
/**
 * This returns the Front class object. There two files use to create Front Object. For example: <br>
 * $frt1 = new Front("forms/myform1.front");<br>
 * then other file back_myform1.back or back_main.back should also available on same path.
 * @param String $TempFilePath Front File Path or String Data Code
 * @param bool $blnStringData Default= false If true then $TempFilePath use as String Data rather then File Path
 * @return Front
 */
public function getFile($TempFilePath,$blnStringData=false){ }

/**
 * Push the Front Object in Running State 
 */
    public function run(){    }
/**
 * echo HTML Output 
 */
    public function rander(){    }

}

/**
 * BackEnd class
 *
 * This class provide infrastructure for Front File. This create a BackEnd Object for Front Object.
 * This provide Inbuilt AJAX Structure to develop Software more easily.
 * @author     Sartaj Singh
 * @copyright  2007
 * @version    4.0.0
 */
class BackEnd{

/**
 * Class Constructor
 * This returns the BackEnd class object.
 * @param String $name Optional
 * @return BackEnd
 */
public function __construct($name='backend'){}
/**
 * Add SartajPHP Component into Front Object with BackEnd Object.
 * @param Object $obj 
 */
public function addComponent($obj){ }
/**
 * Attach TempFile or Front Object with BackEnd Object 
 * @param TempFile $obj 
 */
public function setTempFile($obj){}
/**
 * Set External Temp File
 * @param TempFile $obj 
 */
public function setExtTempFile($obj){}
/**
 * Show also Page Components with Temp File 
 */
public function showPageComp(){}
/**
 * Show Both Page Components and Temp File components 
 */
public function showAll(){}
/**
 * Set Temp File Run and Rander 
 */
public function showTempFile(){}
/**
 * Unset Temp File Run and Rander 
 */
public function showNotTempFile(){}
/**
 * Unset Page Components Run and Rander 
 */
public function showNotPageComp(){}
/**
 * Unset Temp File and Page Components Run and Rander 
 */
public function showNone(){}
/** 
 * onstart Event Handler
 * @abstract 
 */
public function onstart(){}
/** 
 * run Event Handler
 * @abstract 
 */
public function run(){}
/** 
 * rander Event Handler
 * @abstract 
 */
public function rander(){}

}

/**
 * Group class
 *
 * This class make group of Control. This provide easy component interface in application and oop environment.
 * @author     Sartaj Singh
 * @copyright  2007
 * @version    4.0.0
 */
class Group extends Control{
/**
 * Initialize every component in its list 
 */
public function startcomp(){}
/**
 * Add Component in List
 * @param Control $obj 
 */
public function addComponent($obj){}
/**
 * Push All Component in Group in Run State and get HTML Output in $this->innerHTML
 */
public function run(){}
}

?>