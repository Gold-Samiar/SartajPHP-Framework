<?php
/**
 * Description of fileuploader
 *
 * @author SARTAJ
 */
class FileUploader extends Control{
public $maxLen = '';
public $minLen = '';

public function __construct($name='',$fieldName='',$tableName='') {}

     public function setForm($val) { }
     public function setMsgName($val) { }
     public function setRequired() {}
     public function setFileMaxLen($val){  }
     public function getFileMaxLen() { }
     public function setFileMinLen($val){}
public function getFileMinLen() { }
     public function setFileType($val){}
     public function getFileType(){}
     public function setFileSize($val){}
     public function getFileSize(){}
     public function setFileTypesAllowed($val){}
     public function getFileTypesAllowed(){}
     public function getFileTempName(){}
     public function getFilePrevName(){}
     public function getFileExtention(){}
     public function setFileSavePath($val){}

public function getJSValue(){
return "document.getElementById('$this->name').value" ;
}

public function setJSValue($exp){
return "document.getElementById('$this->name').value = $exp;" ;
}

}
?>