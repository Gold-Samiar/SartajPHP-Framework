<?php




class MsgPanel extends Control{

    public function oncreate($param) {
//        $this->unsetRenderTag();
    }
    public function showAlert($type,$msg) {
        global $JSServer;
        $JSServer->addJSONJSBlock("showAlert('$type','$msg');");
    }
    public function sendSuccess($msg) {
        global $JSServer;
            $JSServer->addJSONBlock('html','sphpsuccessmsg',$msg);
            $JSServer->addJSONJSBlock('runanierr("success");');        
    }
    public function sendWarning($msg) {
        global $JSServer;
            $JSServer->addJSONBlock('html','sphpwarningmsg',$msg);
            $JSServer->addJSONJSBlock('runanierr("warning");');        
    }
    public function sendError($errorInner="") {
        global $JSServer;
            $JSServer->addJSONBlock('html','sphpinfomsg',traceMsg(true));
            $JSServer->addJSONBlock('html','sphperrormsg',traceError(true).$errorInner);
            $JSServer->addJSONJSBlock('runanierr("error");runanierr("info");');
    }
    public function onjsrender() {
        addHeaderJSFunction("showAlert", 'function showAlert(type,msg){
', '    if(type=="warning"){
            $("#sphpwarningmsg").html(msg);
            runanierr(type);
    }else if(type=="error"){
            $("#sphperrormsg").html(msg);
    
    }else if(type=="info"){
            $("#sphpinfomsg").html(msg);
            runanierr(type);
    
    }else if(type=="success"){
            $("#sphpsuccessmsg").html(msg);
            runanierr(type);
    }
}
', true);
        addHeaderJSCode("runanierr", 'function runanierr(type){
    $("#sphp" + type).fadeIn(1);
    $("#sphp" + type).css("display","block");
    $("#sphp" + type).delay(5000).fadeOut("slow", function () { $(this).css("display","none"); });            
                }',true);
    }
public function onrender(){

    $this->setPreTag('<div style="position: fixed; z-index: 2000;width: 500px;">
    <div id="sphpwarning" class="alert alert-warning" style="display: none;">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Warning!</strong> <span id="sphpwarningmsg"></span>
    </div>
    <div id="sphperror" class="alert alert-danger" style="display: none;">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Error!</strong> <span id="sphperrormsg"></span>
    </div>
    <div id="sphpsuccess" class="alert alert-success" style="display: none;">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Success!</strong> <span id="sphpsuccessmsg"></span>
    </div>
    <div id="sphpinfo" class="alert alert-info" style="display: none;">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Note!</strong> <span id="sphpinfomsg"></span>
    </div>
</div>
');
    
}

}
