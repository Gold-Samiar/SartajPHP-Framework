<?php
/**
 * Description of ForLoop
 *
 * @author SARTAJ
 */
class ForLoop extends Control{
public $counterMin = 0;
public $counterStep = 1;
public $counterMax = 0;
public $strFormat = '';

public function __construct($name='',$fieldName='',$tableName='') {
$this->init($name,'','');
$this->unsetRanderTag();
}

public function setLoopFrom($val){
$this->counterMin = $val;
}
public function setLoopTo($val){
$this->counterMax = $val;
}
public function setStep($val){
$this->counterStep = $val;
}

private function genRander(){
$stro = executePHPCode('<?php
for($index = $'. $this->name .'->counterMin;$index <= $'. $this->name .'->counterMax;$index += $'. $this->name .'->counterStep ){
?>'.$this->strFormat.'<?php
} ?>');
return $stro;

}


public function onrander(){
  $this->strFormat = $this->innerHTML;
    $this->innerHTML = $this->genRander();
}


}
?>