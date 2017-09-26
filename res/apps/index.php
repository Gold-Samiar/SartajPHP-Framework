<?php
$auth = "GUEST";
$tblName = "product";
//$page->Authenticate();
$masterFile = $masterf;

if($page->isevent){
switch($page->sact){
case 'dt':{
include_once("forms/$page->evtp.php");
$dynData = new $page->evtp();
$dynData->run();
include_once("$masterFile");
break;
}
case 'captcha':{
$dynData = new TempFile("{$phppath}apps/forms/contacts.php");
//$dynData->run();
//include_once("$masterFile");
break;
}
case 'info':{
$dynData = new TempFile("forms/$page->evtp.php");
$dynData->run();
include_once("$masterFile");
break;
}
case 'page' || 'show':{
$dynData = new TempFile("{$dphppath}apps/forms/$page->evtp.php");
$dynData->run();
include_once("$masterFile");
break;
}

}
}

if($page->isnew){ 
$formName = "index";
 }
switch($formName){

    case "index":{
            if(file_exists("forms/index.php")){ 
$dynData = new TempFile("forms/index.php");
            }else{
$dynData = new TempFile("{$dphppath}apps/forms/index.php");
            }
$dynData->run();
include_once("$masterFile");
    break;
	}

}
?>