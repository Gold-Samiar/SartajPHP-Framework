<?php
$cmpid = "demo";
$cmpname = "Demo Company";


$duser = "root";
$db = "sphp";
$dpass = "";
function getSPDB(){
global $duser,$db,$dpass;
$duser = "root";
$db = "sphp";
$dpass = "";
}
function getPluginDB(){
global $duser,$db,$dpass;
$duser = "root";
$db = "sphp";
$dpass = "";
}

$basepath = "http://".$_SERVER['HTTP_HOST']."/gitdemo/demo/";

//app mail settings
$mailServer = "mail.domain.com";
$mailUser = "appmail@domain.com";
$mailPass = "1234";
$mailPort = "26";
$injectProtection = false;

//$masterf = "temp/new_design/master.php";

function getWelcome(){
global $logType;
global $fileName;
global $page;
global $basepath;

switch($logType){
case "ADMIN":{
$page->forward(getAppPath("admhome",'','',true));
break;
}
case "MEMBER":{
$page->forward($basepath);
break;
}

default:{
$page->forward($basepath);
break;
}

}

}
