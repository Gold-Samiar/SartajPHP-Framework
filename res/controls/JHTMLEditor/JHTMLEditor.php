<?php
/**
 * Description of ToolTip
 *
 * @author SARTAJ
 */
include_once("{$libpath}comp/html/TextArea.php");
include_once("{$comppath}jquery.php");

class JHTMLEditor extends TextArea{
private $width = 450;
private $height = 350;

public function removeXML($element){
if ($element->tag=='comment' || strpos($element->tag,':')>0){
$element->outertext = '' ;
}
}

public function __construct($name='',$fieldName='',$tableName='') {
global $HTMLParser;
$this->tagName = "textarea";
$this->init($name,$fieldName,$tableName);
if($this->issubmit){
$this->value = $HTMLParser->parseHTMLTag($this->value,'removeXML',$this);
$this->value = htmlentities($this->value,ENT_COMPAT,"UTF-8");
}
	addHeaderJSCode('jhtml'.$this->name,' var htm'.$this->name.' = null; var htmb'.$this->name.' = false;
	',true);

}

public function setWidth($val){
    $this->width = $val;    
}
public function setHeight($val){
    $this->height = $val;    
}

    public function onprejsrender(){ 
    global $basepath; 
    addFileLink($this->pathres .'scripts/jHtmlArea7.js');
    addFileLink($this->pathres .'style/jHtmlArea.css');
addHeaderJSFunctionCode('ready','jhtml'.$this->name,'
if (!htmb'.$this->name.') {
htmb'.$this->name.' = true;
htm'.$this->name.' = $("#'.$this->name.'").css("height","'.$this->height.'").css("width","'.$this->width.'").htmlarea();
}else{
htm'.$this->name.' = $("#'.$this->name.'").css("height","'.$this->height.'").css("width","'.$this->width.'").htmlarea();
}  
    ');
if($this->formName!=''){
addFooterJSFunctionCode("{$this->formName}_submit", "{$this->name}sub", "
htm{$this->name}.htmlarea('updateTextArea');
");
}

}

}
?>