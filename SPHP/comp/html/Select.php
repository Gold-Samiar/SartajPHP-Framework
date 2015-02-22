<?php
/**
 * Description of Select
 *
 * @author SARTAJ
 */
class Select extends Control{
public $options = '';
public $opt = Array();
public $blnuseasoc = false;
public $selectedIndex = 0;

public function __construct($name='',$fieldName='',$tableName='') {}

     public function setForm($val) { }
     public function setMsgName($val) { }
/**
 * Use Options as diffrent in show in html and in value html filed<br>
 * options[key] = val <br>
 * option value= key <br>
 * option text = val <br>
 * By default = false
 */
     public function setOptionsKeyArray() { }
     public function getOptionsKeyArray() { }
     public function unsetOptionsKeyArray() { }
     public function setSelectedIndex($val) { }
     public function getSelectedIndex() { }
     public function setNotValue($val) { }
/**
 * Pass parameter like $val = "vcd,dvd,mp3";<br>
 * @param String $val
 */
     public function setOptions($val) {}
     public function getOptions() { }
/**
 * Pass parameter like $val[] = Array('VCD','Code 1');<br>
 * $val[] = Array('DVD','Code 2');<br>
 * DVD = value of option tag and 'Code 2' = text<br>
 * @param Array $val
 */
     public function setOptionsArray($val) { }
     public function getOptionsArray() { }
     public function setOptionsElement($index,$value='',$text='') { }
     public function getOptionsElement($index) { }
     public function removeOptionsElement($index) { }
public function setOptionsFromTable($valueField,$textField='',$tableName='',$logic='',$logicStart='',$cacheTime='0'){}
public function getJSValue(){
return "document.getElementById('$this->name').options[document.getElementById('$this->name').selectedIndex].value" ;
}
public function setJSValue($exp){
return "
$(\"select#$this->name\").val($exp);
" ;
}
public function setJSOptionValue($exp){
return "document.getElementById('$this->name').options[document.getElementById('$this->name').selectedIndex] = $exp;" ;

}
public function getJSSelectedIndex(){
return "document.getElementById('$this->name').selectedIndex" ;
}


}
?>