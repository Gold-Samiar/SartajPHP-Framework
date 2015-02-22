<?php
/**
 * ImageObject class
 *
 * This class create PHP Image Object.
 * @author     Sartaj Singh
 * @copyright  2007
 * @version    4.0.0
 */
class ImageObject{
/** @var int */
public $width = 0;
/** @var int */
public $height = 0;
/** @var String */
public $mime = "image/jpeg";
/** @var gd.image */
public $data;
/**
 * Class Constructor
 * This returns the ImageObject class object
 * @param string $path Image File Path 
 * @return ImageObject
 */
public function ImageObject($path=''){ }
/**
 *
 * @param String $path Image File Path 
 */
public function loadFile($path){ }
/**
 *
 * @param gd.image $val 
 */
public function setImageData($val){ }
/**
 * @return gd.image 
 */
public function getImageData(){ }
/**
 * Check if mime is valid type
 * @return boolean 
 */
public function isValidType(){}

}
?>
