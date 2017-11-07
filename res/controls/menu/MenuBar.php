<?php
/**
 * Description of MenuBar
 *
 * @author SARTAJ
 */
include_once("{$libpath}tools/Control.php");
include_once("{$comppath}jquery.php");
$blnAjaxLink = false;

class MenuBar extends Control{
    private $navbarClasses = "navbar navbar-expand-md bg-dark navbar-dark";
    private $brandicon = "";
    
public function __construct($name='',$fieldName='',$tableName='') {
$this->init($name,$fieldName,$tableName);
$this->setHTMLName("");
$this->setHTMLID("");
}

public function setNavbarCSS($val){ 
    $this->navbarClasses = $val;
}
public function onjsrender(){ 
//addFileLink($this->pathres.'menu.css');
//addFileLink($this->pathres.'menu.js');
}

public function setBrandIcon($val) {
    $this->brandicon = $val;
}

public function onrender(){
    addHeaderJSFunctionCode("ready", "navbar", '
    var links = $(\'.navbar ul li a\');
    $.each(links, function (key, va) {
        if (va.href == document.URL) {
            $(this).addClass(\'active\');
            var pa = $(this).parents(\'li.nav-dli\');
            $.each(pa, function (key2, va2) {
                $(va2).children("a.nav-dlink:first").addClass(\'active\');
            });
        }
    });
    $(\'.dropdown-menu a.dropdown-toggle\').on(\'click\', function(e) {
  if (!$(this).next().hasClass(\'show\')) {
    $(this).parents(\'.dropdown-menu\').first().find(\'.show\').removeClass("show");
  }
  var $subMenu = $(this).next(".dropdown-menu");
  $subMenu.toggleClass(\'show\');
  $(this).parents(\'li.nav-item.dropdown.show\').on(\'hidden.bs.dropdown\', function(e) {
    $(\'.dropdown-submenu .show\').removeClass("show");
  });
  return false;
});
$(\'.nav-dlink\').click();
',true);
    addHeaderCSS("navbar", ' .dropdown-submenu {
  position: relative;
}

.dropdown-submenu a::after {
  transform: rotate(-90deg);
  position: absolute;
  right: 6px;
  top: .8em;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-left: .1rem;
  margin-right: .1rem;
} ', true);
    if($this->brandicon != ""){
        $this->brandicon = '  <!-- Brand -->
  <a class="navbar-brand" href="#"><img src="'. $this->brandicon .'" alt="Logo" style="width:40px;"></a>
';
    }
$this->setPreTag('<nav class="'. $this->navbarClasses .'"> '. $this->brandicon .'
  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav'. $this->name .'">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="nav'. $this->name .'">
');
$this->setAttribute('class', "navbar-nav");
$this->tagName = "ul";
$this->setPostTag('</div></nav>');
}

}

?>