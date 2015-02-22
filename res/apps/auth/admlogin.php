<?php
$auth = "GUEST,ADMIN";
$tblName = "admin";
$masterFile = $admmasterf;
$page->Authenticate();

$dynData = new TempFile("{$dphppath}apps/auth/forms/admlogin.php");

if($page->isevent){
switch($page->sact){

case "logout" :{
    destSession();
    getWelcome();

break;
}

}
}

if($page->issubmit){
setSession('ADMIN', $cmpid);
getWelcome();
}


if($page->isnew){
$formName = "admlogin";
 }
switch($formName){

    case "admlogin":{
$title = "Login System";
$metakeywords = "";
$metadescription = "";
$metaclassification = "";
$dynData->run();
include_once("$masterFile");
    break;
	}

}
?>