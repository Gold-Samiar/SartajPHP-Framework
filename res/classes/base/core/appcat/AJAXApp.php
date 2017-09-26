<?php
class AJAXApp extends Sphp\tools\WebApp{
    public function page_new(){
        global $jquerypath,$libpath;
        addFileLink("{$jquerypath}jslib.js",true);
        addFileLink("{$libpath}comp/html/jslib/validation.js",true);
        addFileLink("{$libpath}comp/html/jslib/jquery.form.js",true);
//        addFileLink("{$jquerypath}ui/jquery.ui.button.min.js",true);
//        addFileLink("{$jquerypath}ui/jquery.ui.dialog.min.js",true);
        
    }
    

}