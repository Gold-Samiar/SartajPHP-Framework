<?php 
include_once($phppath . "/comp/bundle/menu/BootstrapSideMenu.php"); 
class MenuUiSide extends BootstrapSideMenu{
    public function onstart() {
        //$this->sphp_api->banMenuLink("Logout","Home");
        $this->sphp_api->addMenu("Home","","fa fa-home");
        $this->sphp_api->addMenuLink("Home", getAppURL("admhome"),"fa fa-home","Home");
        $this->sphp_api->addMenuLink("Plugin Home", getAppURL("installer"),"fa fa-cog","Home");
        $this->sphp_api->addMenuLink("Logout", getEventURL("logout","","admin"),"fa fa-power-off","Home");
        include_once("plugin/cadmmenu.php"); 
    }
}
