<?php
// load js lib and jquery ready function
//addFileLink("{$respath}jquery/jquery-min.js",true);
//addFileLink("{$respath}jquery/jquery-min1.10.js",true,"jquery-min");
addFileLink("{$respath}jslib/jquery/jquery-ui.min.css",true);
addFileLink("{$respath}jslib/jquery/jquery-ui.theme.min.css",true);
addFileLink("{$respath}jslib/jquery/jquery-ui.structure.min.css",true);
addFileLink("{$respath}jslib/jquery/jquery-min1.9.1.js",true,"jquery-min");
addFileLink("{$respath}jslib/jquery/jquery-ui.min.js",true);

// add jlib
addFileLink("{$respath}jslib/jquery/jlib.js",true);

// load js migrate lib 
//addFileLink("{$respath}jquery/jquery-migrate-1.2.1.min.js",true);
addHeaderJSFunction('ready', "$(document).ready(function() {", "});",true);
addHeaderJSFunction('ready', "$(document).ready(function() {", "});");
addHeaderJSFunction('pageload', "$(window).load(function() {", "});",true);
function addBootStrap(){
global $respath;
addFileLink("{$respath}jslib/twitter/css/bootstrap.min.css",true);
addFileLink("{$respath}jslib/twitter/css/bootstrap-theme.min.css",true);    
addFileLink("{$respath}jslib/twitter/js/bootstrap.min.js",true);
}
function addAngular(){
global $respath;
addFileLink("{$respath}jslib/angular/angular.js",true);
addFileLink("{$respath}jslib/angular/angular-mocks.js",true);
}
