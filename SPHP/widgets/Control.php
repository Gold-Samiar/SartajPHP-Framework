<?php
/*
 * Copyright (c) 2006 Randhawa Tech.  All rights reserved.
 * Redistribution of source must retain this copyright notice.
 *
 * Sartaj Singh (http://www.randhawatech.com) is a software consultant.
 *
 */

/**
 * Class Control.<br>
 * <strong>Description</strong>:-<br>
 * For Create HTML, JS, or any Controls. <br>
 * This is parent class of all Controls.<br>
 * @author Sartaj Singh <sartaj@sartajsingh.com>
 * @copyright Copyright(c) 2006 Randhawa Tech.
 * @link http://www.randhawatech.com
 * @var Object
 * 
 */
class Control {
/** @var String */
public $name = '';
/** @var String HTML Tag Name */
public $tagName = '';
/** @var String Value */
public $value = '';
/** @var String Default Value */
public $defvalue = '';
/** @var String Data Type */
public $dataType = 'STRING';
/** @var String Pre Tag Data */
public $preTag = '';
/** @var String Post Tag Data */
public $postTag = '';
/** @var String use as html tag parameter as assoc array then we can override same key */
public $parameterA = array(); 
/** @var String use as html tag dynamic parameter as assoc array then we can override same key */
public $parameterAD = array();
/** @var String innerHTML Data of a Component Tag */
public $innerHTML = '';
/** @var String Bind Component with Database Table. If Empty the use Default Table of Application */
public $dtable = '';
/** @var String Bind Component with Database Table Field */
public $dfield = '';
/** @var bool Data binding Status of a Component */
public $dataBound = false;
/** @var bool If Data Fill by $page->viewData() or not into this Component */
public $blnDontFill = false;
/** @var bool Dont Submit this Component to Server */
public $blnDontSubmit = false;
/** @var bool Dont Insert this Component value to Database with $page->insertData() function */
public $blnDontInsert = false;
/** @var bool Dont Update this Component value to Database with $page->updateData() function */
public $blnDontUpdate = false;
/** @var String HTML Tag name Atribute of this Component */
public $HTMLName = '';
/** @var String HTML Tag id Atribute of this Component */
public $HTMLID = '';
/** @var bool Component visible Status */
public $visible = true;
/** @var bool Component Rander Status */
public $randerMe = true;
/** @var bool Component Tag Rander  Status */
public $randerTag = true;
/** @var bool check component value is post by browser or not */
public $issubmit = false;
/** @var bool set if Component html has end tag */
public $blnendtag = true;
/** @var String Component Class PHP Path */
public $path = '';
/** @var String Component Class Resource Path */
public $pathres = '';
/**
 * Class Constructor
 * This returns the Control class object.
 * @param String $name Optional
 * @param String $fieldName Optional
 * @param String $tableName Optional
 * @return Control
 */
  public function __construct($name='',$fieldName='',$tableName='') {}
 

/**
 * Set Name of Object which is used for html tag id and name.
 * @param String $val
 */
     public function setName($val) {}
/**
 * Get Name of Object which is used for html tag id and name.
 * @return String
 */
     public function getName() { }
/**
 * Set Value of Controls which is used for html output.<br>
 * $txtName = new TextField();<br>
 * $txtName->setValue='Ram';<br>
 * html output equals to <input value='Ram' /><br>
 * @param String $val
 */
     public function setValue($val) { }
     public function getValue() { }
     public function setDefaultValue($val) { }
     public function getDefaultValue() { }
     public function setPreTag($val) { }
     public function getPreTag() {}
     public function setPostTag($val) {}
     public function getPostTag() {}
     public function setParameterA($name,$val) {}
     public function getParameterA() {}
     public function getAttribute($name) {}
     public function setParameterAD($name,$val) { }
     public function getParameterAD() {}
     public function setInnerHTML($val) {}
     public function getInnerHTML() { }
     public function setInnerHTMLApp($val) {}
     public function getInnerHTMLApp() { }
     public function setVisible() {}
     public function unsetVisible() {}
     public function getVisible() { }
     public function setRander() { }
     public function unsetRander() { }
     public function getRander() { }
     public function setRanderTag() { }
     public function unsetRanderTag() { }
     public function getRanderTag() { }
     public function setDataType($val) { }
     public function getDataType() { }
     public function setDataBound() { }
     public function unsetDataBound() { }
     public function getDataBound() {  }
     public function setDontFill() {  }
     public function unsetDontFill() { }
     public function getDontFill() {  }
     public function setDontSubmit() { }
     public function unsetDontSubmit() { }
     public function getDontSubmit() {  }
     public function getDontInsert() { }
     public function setDontInsert() { }
     public function unsetDontInsert() {}
     public function getDontUpdate() { }
     public function setDontUpdate() { }
     public function unsetDontUpdate() { }
     public function getEndTag() { }
     public function setEndTag() { }
     public function unsetEndTag() {}
     public function setHTMLName($val) { }
     public function setHTMLID($val) { }
     public function setOnCreatePHP($val) { }
     public function setOnPreranderPHP($val) { }
     public function setOnRanderPHP($val) {  }
     public function setPathRes($val) { }

/**
 * Call Rander Component
 * @return String 
 */
public function rander(){ }
/**
 * Call Pre Rander Component
 */
public function prerander(){}
/**
 * Comp Create Handler
 * @param html_node $element 
 */
public function oncompcreate($element){}

// override function in child for change behaviour of control
/**
 * Overwrite oncreate Handler function
 * @abstract
 */
public function oncreate($element){}
/**
 * Overwrite onprerander Handler function
 * @abstract
 */
public function onprerander(){}
/**
 * Overwrite onprejsrander Handler function
 * @abstract
 */
public function onprejsrander(){}
/**
 * Overwrite onrander Handler function
 * @abstract
 */
public function onrander(){}
/**
 * Overwrite onjsrander Handler function
 * @abstract
 */
public function onjsrander(){}
/**
 * Convert to String 
 */
public function __toString(){}
/**
 * Component init function 
 * @param String $name
 * @param String $fieldName For Database Binding
 * @param String $tableName For Database Binding
 */
public function init($name='',$fieldName='',$tableName=''){}


}
?>