<?php
// load js lib and jquery ready function
//addFileLink("{$respath}jquery/jquery-min.js",true);
addFileLink("{$respath}jquery/jquery-min1.10.js",true,"jquery-min");
//addFileLink("{$respath}jquery/jquery-min_latest.js",true);

// add jlib
addFileLink("{$respath}jquery/jlib.js",true);

// load js migrate lib 
//addFileLink("{$respath}jquery/jquery-migrate-1.2.1.min.js",true);
addHeaderJSFunction('ready', "$(document).ready(function() {", "});",true);
addHeaderJSFunction('ready', "$(document).ready(function() {", "});");
addHeaderJSFunction('pageload', "$(window).load(function() {", "});",true);
function addBootStrap(){
global $respath;
addFileLink("{$respath}sartajc/jquery/twitter/js/bootstrap.min.js",true);
addFileLink("{$respath}sartajc/jquery/twitter/css/bootstrap.min.css",true);
addFileLink("{$respath}sartajc/jquery/twitter/css/bootstrap-theme.min.css",true);    
}
?>