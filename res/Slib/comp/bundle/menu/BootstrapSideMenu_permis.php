<?php

class BootstrapSideMenu extends \Sphp\tools\MenuGen{
public $brandicon =  "";
public $navbarClasses = "nav flex-column  mb-sm-auto mb-0 align-items-center align-items-sm-start";

public $template_menu_startroot = '<li><hr class="text-primary" style="height: 4px; background-color: #FFFFFF;" /></li><li class="nav-item nav-dli"><a class="nav-link nav-dlink align-middle px-0" data-bs-toggle="collapse" data-bs-target="#$mnuhref2" href="#$mnuhref2" >' . 
'<i class="$mnuicon"></i> <span class="ms-1 d-none d-sm-inline">$mnutitle</span></a>'
. '<div id="$mnuhref2" aria-expanded="true"><ul class="nav flex-column pl-2 ms-1">';
public $template_menu_endroot = '</ul></div></li>';
public $template_menu_start = '<li class="nav-item nav-dli"><a class="nav-link nav-dlink collapsed align-middle px-0" data-bs-toggle="collapse" data-bs-target="#$mnuhref2" href="#$mnuhref2" >' . 
'<i class="$mnuicon"></i> <span class="d-none d-sm-inline">$mnutitle</span></a>'
. '<div class="collapse" id="$mnuhref2" aria-expanded="false"><ul class="flex-column pl-2 nav ms-1">';
public $template_menu_end = '</ul></div></li>';
public $template_menu_startno = '<li class="nav-item"><a class="nav-link px-0" data-mkey="$this->mkey" href="$mnuhref"><i class="$mnuicon"></i> <span class="d-none d-sm-inline">$mnutitle</span></a>';
public $template_menu_endno = '</li>';
public $template_menulink = '<li class="nav-item"><a class="nav-link nav-dli px-0" data-mkey="$this->mkey" href="$mnuitemhref"><i class="$mnuicon"></i> <span class="d-none d-sm-inline">$mnuitemtext</span></a></li>';

private $mkey = "";
private $mkeychar = "";
private $fixedPos = "";
private $rootMenu = "sidebar";
private $counter1 = 1;

public function onrun() {
    if($this->brandicon == "") $this->brandicon =  SphpBase::sphp_settings()->res_path . "/Slib/temp/default/imgs/favicon-96x96.png";
    $this->init();
    $this->genMenus();
}
public function setPosition($val="sticky-top") {
    // fixed-bottom fixed-top sticky-top
    $this->fixedPos = $val;
}
public function setRootMenu($val) {
    $this->rootMenu = $val;
}
public function setNavBarCss($val) {
    $this->navbarClasses = $val;
}
public function setBrandIcon($val) {
    $this->brandicon = $val;
}
public function genMenus() {
    $strmbar = $this->genMenuBar();
    $mnuroot = $this->sphp_api->getMenuList("root");
    // generate bootstrap 4 menu
    $str1 = "";
    foreach ($mnuroot as $mnuName => $lstMenu) {
        if($lstMenu[4] == ""){
            $str1 .= $this->genMenu($lstMenu);            
        }else if(SphpBase::sphp_permissions()->isPermission($lstMenu[4])){
            $str1 .= $this->genMenu($lstMenu);
        }
    }
    $this->htmlout = $strmbar[0] . $str1 . $strmbar[1];
}
private function genMenu($lstMenu,$submenu=0){
    $mnuroot = $this->sphp_api->getMenuList($lstMenu[0]);
    $stra = array();
    $str = "";
    $str1 = "";
    if($mnuroot != null){
        foreach ($mnuroot as $mnuName => $lstMenu2) {
            if($lstMenu2[4] == ""){
                $str .= $this->genMenu($lstMenu2,1);
            }else if(SphpBase::sphp_permissions()->isPermission($lstMenu2[4])){
                $str .= $this->genMenu($lstMenu2,1);
            }
        }
        $str1 = $this->genMenuLinks($this->sphp_api->getMenuLinkList($lstMenu[0]));
        if($str1 != ""){
            $stra = $this->getB4Menu($lstMenu[0],$lstMenu[1],$lstMenu[2],$lstMenu[3],$submenu);  
        }else{
            $stra = $this->getB4Menu($lstMenu[0],$lstMenu[1],$lstMenu[2],$lstMenu[3],$submenu);              
        }
        return $stra[0] . $str . $str1 . $stra[1];
            
    }else{
        $str = $this->genMenuLinks($this->sphp_api->getMenuLinkList($lstMenu[0]));
        if($str != ""){
            $stra = $this->getB4Menu($lstMenu[0],$lstMenu[1],$lstMenu[2],$lstMenu[3],$submenu);  
        }else{
            $stra = $this->getB4Menu($lstMenu[0],$lstMenu[1],$lstMenu[2],$lstMenu[3],2);              
        }
        return $stra[0] . $str . $stra[1];
    }
    
}
private function genMenuLinks($mnuroot){
    $str = "";
    if($mnuroot != null){
    foreach ($mnuroot as $mnuLinkName => $lstMenuLink) {
        if($lstMenuLink[4] == ""){
            $str .= $this->getB4MenuLink($lstMenuLink[0],$lstMenuLink[1],$lstMenuLink[2],$lstMenuLink[3]); 
        }else if(SphpBase::sphp_permissions()->isPermission($lstMenuLink[4])){
            $str .= $this->getB4MenuLink($lstMenuLink[0],$lstMenuLink[1],$lstMenuLink[2],$lstMenuLink[3]); 
        }
    }
    }
    return $str;
}
private function setAjax(){
$this->blnAjaxLink = true;
SphpBase::JSServer()->getAJAX();
addHeaderJSFunction('menu_ajax', "function menu_ajax(url){
", " getURL(url); }");
}
private function getB4Menu($mnutext,$mnuhref="",$mnuicon="",$blnAjaxLink2=false,$mnuSub=0){
$mnutitle = $mnutext;
if($mnuhref==''){
    $mnuhref = "#";
}else if($blnAjaxLink2){
    if(!$this->blnAjaxLink){
        $this->setAjax();
    }
    $mnuhref = "javascript: menu_ajax('$mnuhref');";
}
$mnuhref2 = 'd'. $this->counter1;
$this->counter1 += 1;
$stro = array();
$vars = array(
  '$mnuhref2' => $mnuhref2,
  '$mnuhref' => $mnuhref,
  '$mnuicon' => $mnuicon,
  '$mnutitle' => $mnutitle,
  '$this->mkey' => $this->mkey
);
// if menu under root and dropdown
if($mnuSub==0){
$stro[0] = strtr($this->template_menu_startroot,$vars);
$stro[1] = strtr($this->template_menu_endroot,$vars);
}else if($mnuSub==1){ // if sub menu and dropdown
$stro[0] = strtr($this->template_menu_start,$vars);
$stro[1] = strtr($this->template_menu_end,$vars);
}else{ // if menu with no links and no sub menu without dropdown
$stro[0] = strtr($this->template_menu_startno,$vars); 
$stro[1] = strtr($this->template_menu_endno,$vars);   
}
return $stro;
}
private function getB4MenuLink($mnuitemtext,$mnuitemhref="",$mnuicon="",$blnAjaxLink2=false){
$mnuitemtitle = $mnuitemtext;
$mnuitemtext = $mnuitemtext . $this->mkeychar;
$tfun = "menu_ajax";
if($mnuitemhref==''){
    $mnuitemhref = "#";
}else if($blnAjaxLink2){
    $mnuitemhref = "javascript: $tfun('$mnuitemhref');";
}
$vars = array(
  '$mnuitemhref' => $mnuitemhref,
  '$mnuicon' => $mnuicon,
  '$mnuitemtext' => $mnuitemtext,
  '$this->mkey' => $this->mkey
);

return strtr($this->template_menulink,$vars);
}
public function genMenuBar() {
if($this->brandicon != ""){
$this->brandicon = '  <!-- Brand -->
<div class="col-12 text-center"><a class="" href="#">
<img class="img img-fluid rounded-circle shadow-4-strong" src="'. $this->brandicon .'" alt="Logo">'
        . '</a>'
        . '<h4>Menu</h4><hr />'
        . '</div>';
}
$bootstrapMenu = $this->brandicon . '<div class="snavbar"><ul class="'. $this->navbarClasses .'">';
return array($bootstrapMenu,'</ul></div>');
}
private function setKey($key,$controlkeys="") {
$fkeya = array();
$fkeya["F1"] = 112;
$fkeya["F2"] = 113;
$fkeya["F3"] = 114;
$fkeya["F4"] = 115;
$fkeya["F5"] = 116;
$fkeya["F6"] = 117;
$fkeya["F7"] = 118;
$fkeya["F8"] = 119;
$fkeya["F9"] = 120;
$fkeya["F10"] = 121;
$fkeya["F11"] = 122;
$fkeya["F12"] = 123;
$mkeychar = "";
$controlkeysp = ""; 
    if(!is_numeric($key)){
        $mkeychar = strtoupper($key);
        if(strlen($key)>1){
            $key = $fkeya[$mkeychar];            
        }else{
            $key = ord($mkeychar);
        }
    }else{
        $mkeychar = strtoupper(chr($key));
    }
    if($controlkeys != ""){
        $controlkeysp = "+"; 
    }
    $this->mkeychar = " ". strtoupper($controlkeys). $controlkeysp . $mkeychar;
    $this->mkey = $key;
    $controlkeysa = explode('+',$controlkeys);
    $strkey = "";
    foreach ($controlkeysa as $key => $value) {
        if($value == "alt"){
            if($strkey != "") $strkey .= " && ";
            $strkey .= "eventer.event.altKey";
        }else if($value == "ctrl"){
            if($strkey != "") $strkey .= " && ";
            $strkey .= "eventer.event.ctrlKey";
        }else if($value == "shift"){
            if($strkey != "") $strkey .= " && ";
            $strkey .= "eventer.event.shiftKey";
        }
    }
    if($strkey != "") $strkey .= " && ";
    // code depend on key listner javascript code of framework
    addHeaderJSFunction("jq_menukeyevent", "function jq_menukeyevent(eventer){", "}",true);
    addHeaderJSFunctionCode("jq_keyevent", "menukeyevent1", 'ret = jq_menukeyevent(eventer2);',true);
    addHeaderJSFunctionCode("jq_menukeyevent", $this->name, ' if('. $strkey .'eventer.keycode=='. $this->mkey .'){
        if(eventer.evt==\'keyup\'){
            $(".dropdown-item[data-mkey='.$this->mkey.']")[0].click();
            return false;
        }
    } 
',true);
    //console.log(eventer.keycode);
  //console.log(eventer.event.shiftKey);
  //console.log(eventer.event.ctrlKey);
  //console.log(eventer.event.altKey);
}

private function init() {
        addHeaderJSFunctionCode("ready", "snavbar1", '
    var links = jql(\'.snavbar a\');
    jql.each(links, function (key, va) {
        if (va.href == document.URL) {
            jql(this).addClass(\'active\');
            var pa = jql(this).parents(\'li.nav-dli\');
            jql.each(pa, function (key2, va2) {
                jql(va2).children("a.nav-dlink:first").addClass(\'active\');
            });
        }
    });
    //jql(\'.nav-dlink\').click();
jql.each(jql(\'.nav-dlink\'), function (key, va) {
    va.click();
});
',true);
    addHeaderCSS("snavbar", '.nav-link[data-bs-toggle].collapsed:before {
    content: " \2191";
}
.nav-link[data-bs-toggle]:not(.collapsed):before {
    content: " \2193";
}

', true);

}

}
