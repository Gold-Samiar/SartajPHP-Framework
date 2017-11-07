<?php
/**
 * Description of MenuBar
 *
 * @author SARTAJ
 */
include_once("{$libpath}tools/Control.php");
include_once("{$comppath}jquery.php");
$mnucusto = '';


class MenuBarCusto extends Control{

public function __construct($name='',$fieldName='',$tableName='') {
$this->setHTMLName("");
$this->setHTMLID("");
    $this->unsetRanderTag();
}

public function oncreate($ele){
global $mnucusto;
$mnucusto = $ele->innertext;
$ele->innertext ="";
}


}
?>