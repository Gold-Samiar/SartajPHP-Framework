<?php
// cache time in sec
$mintime = "0";
$midtime = "0";
$maxtime = "0";
// set session state, if false you can not login
$sphp_use_session = true;
$sphp_app_cmd = false;
// Default Language
$serv_language = "ENGLISH"; 
// debug mode
$debugmode = true;
//$debugprofiler = "{$phppath}classes/base/debug/FirePHPCore/SayjelProfiler.php";
$debugprofiler = "{$phppath}classes/base/debug/FirePHPCore/SPHP_Profiler2.php";
$errorLog = true;
$sphpRunasLib = false;
$run_hd_parser = false;
$blnEditMode = false;

$jquerypath = "{$respath}jslib/jquery/";
$comppath = "{$phppath}controls/";
$libpath = "{$phppath}{$libversion}/";

$ddriver = "";
$duser = "root";
$db = "dbplugin";
$dpass = "";
$dhost = "localhost";
$dport = "";

$injectProtection = false;

$masterf = "{$phppath}temp/default/master.php";
$mobimasterf = "{$phppath}temp/default/mobimaster.php";
$admmasterf = "{$phppath}temp/default/admmaster.php";
$mebmasterf = "{$phppath}temp/default/admmaster.php";
$softmasterf = "{$phppath}temp/default/softmaster.php";

if (filter_input(INPUT_SERVER, "HTTP_HOST", FILTER_FLAG_EMPTY_STRING_NULL)) {
    $basepath = "http://".$_SERVER['HTTP_HOST']."/";
} else {
    $basepath = "";
}
$serverpath = $_SERVER['DOCUMENT_ROOT'];
$SESSION_NAME = 'SPHPID';
$SESSION_PATH = '';
// admin login user
$admuser = 'admin';
$admpass = '1234';

include_once 'comp.php';
