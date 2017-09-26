<?php
/**
 * Description of captcha
 *
 * @author SARTAJ
 */
//include_once("{$libpath}comp/html/TextField.php");


class Captcha extends Sphp\comp\html\TextField{

public function __construct($name='',$fieldName='',$tableName='') {
global $page,$Client;
global $libpath;
global $comppath;
$this->init($name,$fieldName,$tableName);
$this->unsetEndTag();
if($this->issubmit){
if($Client->session('image_value') != md5(strtoupper($this->getValue()))){
setErr('Captcha', "Secure Image Code is not Correct!");

}
}

if($page->isevent)
{
switch($page->sact){
case "captcha" :{ 
$engine = getSphpEngine();
$engine->stopOutput();
include_once("{$comppath}captcha/cap.php");
break;
}

}

 }

}



public function onrender(){
global $libpath;
if($this->value!=''){
$this->parameterA['value'] = $this->value;
}
if($this->maxLen!=''){
$this->parameterA['maxlength'] = $this->maxLen;
}
$this->setPreTag('<img src="'.  getEventPath('captcha').'" width="150px" height="50px"><br>');

}

}
?>