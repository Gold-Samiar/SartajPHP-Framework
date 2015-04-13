<?php
// cache time in sec
$mintime = "0";
$midtime = "0";
$maxtime = "0";
// set session state, if false you can not login
$sphp_use_session = true;
// Default Language
$serv_language = "ENGLISH"; 
// debug mode
$debugmode = false;
//$debugmode = true;
//$debugprofiler = "{$phppath}classes/base/debug/FirePHPCore/SPHP_Profiler.php";
$errorLog = false;

$jquerypath = "{$respath}jquery/";
$comppath = "{$phppath}sartajc/";
$libpath = "{$phppath}sartaj/";

$duser = "root";
$db = "dbplugin";
$dpass = "";

$errPage = "err";
$errorLog = false;
$dhost = "localhost";

$injectProtection = false;

$masterf = "{$phppath}temp/default/master.php";
$admmasterf = "{$phppath}temp/default/admmaster.php";
$mebmasterf = "{$phppath}temp/default/admmaster.php";
$softmasterf = "{$phppath}temp/default/softmaster.php";


$basepath = "http://".$_SERVER['HTTP_HOST']."/";
$serverpath = $_SERVER['DOCUMENT_ROOT'];
$SESSION_NAME = 'SPHPID';
$SESSION_PATH = '';
// admin login user
$admuser = 'admin';
$admpass = '1234';

include_once 'comp.php';

