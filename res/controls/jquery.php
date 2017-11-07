<?php

// load js lib and jquery ready function
//addFileLink("{$respath}jquery/jquery-min.js",true);
//addFileLink("{$respath}jquery/jquery-min1.10.js",true,"jquery-min");
//addFileLink("{$respath}jslib/jquery/jquery-min1.9.1.js",true,"jquery-min");
addFileLink("{$respath}jslib/jquery/jquery-3.2.1.min.js", true, "jquery-min");



// add jlib
addFileLink("{$respath}jslib/jquery/jlib.js", true);

// load js migrate lib 
//addFileLink("{$respath}jquery/jquery-migrate-1.2.1.min.js",true);
addHeaderJSFunction('ready', "$(document).ready(function() {", "});", true);
addHeaderJSFunction('ready', "$(document).ready(function() {", "});");
addHeaderJSFunction('pageload', "$(window).on('load',function() {", "});", true);

function addjQueryUI() {
    global $respath;
    addFileLink("{$respath}jslib/jquery/jquery-ui.min.css", true);
    addFileLink("{$respath}jslib/jquery/jquery-ui.theme.min.css", true);
    addFileLink("{$respath}jslib/jquery/jquery-ui.structure.min.css", true);
    addFileLink("{$respath}jslib/jquery/jquery-ui.min.js", true);
}

function addBootStrap() {
    global $respath;
    addFileLink("{$respath}jslib/twitter/bootstrap4/css/bootstrap.min.css", true);
    addFileLink("{$respath}jslib/twitter/bootstrap4/css/bootstrap-grid.min.css", true);
    addFileLink("{$respath}jslib/twitter/bootstrap4/css/bootstrap-reboot.min.css", true);
    addFileLink("{$respath}jslib/twitter/bootstrap4/js/popper.min.js", true);
    addFileLink("{$respath}jslib/twitter/bootstrap4/js/bootstrap.min.js", true);
    addFileLink("{$respath}jslib/twitter/bootstrap4/js/bootstrap.bundle.min.js", true);
}

function addBootStrap3() {
    global $respath;
    addFileLink("{$respath}jslib/twitter/bootstrap3/css/bootstrap.min.css", true);
    addFileLink("{$respath}jslib/twitter/bootstrap3/css/bootstrap-theme.min.css", true);
    addFileLink("{$respath}jslib/twitter/bootstrap3/js/bootstrap.min.js", true);
}

function addAngular() {
    global $respath;
    addFileLink("{$respath}jslib/angular/angular.js", true);
    addFileLink("{$respath}jslib/angular/angular-mocks.js", true);
}

function addjQueryMobile() {
    global $respath;
    addFileLink("{$respath}jslib/jquery.mobile-1.4.5/jquery.mobile.external-png-1.4.5.min.css", true);
    addFileLink("{$respath}jslib/jquery.mobile-1.4.5/jquery.mobile.icons-1.4.5.min.css", true);
    addFileLink("{$respath}jslib/jquery.mobile-1.4.5/jquery.mobile.inline-png-1.4.5.min.css", true);
    addFileLink("{$respath}jslib/jquery.mobile-1.4.5/jquery.mobile.inline-svg-1.4.5.min.css", true);
    addFileLink("{$respath}jslib/jquery.mobile-1.4.5/jquery.mobile.structure-1.4.5.min.css", true);
    addFileLink("{$respath}jslib/jquery.mobile-1.4.5/jquery.mobile.theme-1.4.5.min.css", true);
    addFileLink("{$respath}jslib/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css", true);
    addFileLink("{$respath}jslib/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js", true);
}
