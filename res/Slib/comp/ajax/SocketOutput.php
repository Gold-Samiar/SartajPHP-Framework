<?php

/**
 * Description of SocketOutput
 * Socket work with native app to process as outsider from web server environment. This component 
 * create socket and 
 * display data send by native app.
 * Temp File code:-
 * <div id="div1" runat="server" path="libpath/comp/ajax/SocketOutput.php"></div>
 * Then call js function:-
 * Params = $controller,$evt,$evtp,$data
 * callApp('shell','ls','-l',{});
 * @author SARTAJ
 */
class SocketOutput extends \Sphp\tools\Control {

    private $url = '';

    public function setURL($param) {
        $this->url = $param;
    }

    public function onjsrender() {
        $protocol = "ws";
        $this->setAttributeDefault('style', 'style="overflow-y: scroll; height: 500px; max-height: 500px;');
        $this->setAttributeDefault('class', 'text-wrap');
        addHeaderJSCode($this->name , 'window["'. $this->name .'"] = null; function callApp(ctrl,evt="",evtp="",data={}){
        $("#'. $this->name .'").html(\'\');
        window["'. $this->name .'"].callProcessApp(ctrl,evt,evtp,data);
    }
');
        if (\SphpBase::sphp_request()->server('HTTPS') == 1) $protocol = "wss";
        if ($this->url == '')
            $this->url = $protocol . '://' . SphpBase::sphp_request()->server('HTTP_HOST') . '/sphp.ws';
        addHeaderJSFunctionCode("ready", "socketnative", 'tempobj.getSphpSocket(function(wsobj1){
        window["'. $this->name . '"] = wsobj1;
        tempobj.onwsmsg = function(msg){ 
            $("#'. $this->name .'").append(\'<p>\' + msg +  \'</p>\');
        };
    });');
    }

}
