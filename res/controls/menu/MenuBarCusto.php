<?php
/**
 * Description of MenuBar
 *
 * @author SARTAJ
 */

namespace{
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
}
