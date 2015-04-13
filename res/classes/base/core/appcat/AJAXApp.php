<?php
class AJAXApp extends WebApp{
    public function page_new(){
        global $jquerypath,$libpath;
        addFileLink("{$jquerypath}jslib.js",true);
        addFileLink("{$libpath}comp/html/jslib/validation.js",true);
        addFileLink("{$libpath}comp/html/jslib/jquery.form.js",true);
    }
    
    public function page_event($event,$evtp){
        $fun = "page_event_{$event}";
            if(method_exists($this, $fun)){
        $this->{$fun}($evtp);
            }
    }

}