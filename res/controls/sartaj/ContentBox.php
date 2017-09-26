<?php
/**
 * Description of ContentBox
 *
 * @author SARTAJ
 */
include_once("{$libpath}tools/Control.php");

class ContentBox extends Control{

public function __construct($name='',$fieldName='',$tableName='') {
}

public function oncreate($element){
$this->setHTMLName("");
}


public function onjsrender(){
global $jquerypath;
//addFileLink('$jquerypath/themes/base/jquery.ui.all.css');
    if($this->parameterA['class'] == ''){
$this->parameterA['class'] = 'ui-widget-content ui-corner-all';
}

}


}
?>