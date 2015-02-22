<?php
/**
 * Canvas class
 *
 * This class provide PHP Canvas.
 * @author     Sartaj Singh
 * @copyright  2007
 * @version    4.0.0
 */
class Canvas{
/** @var int */
public $width = 0;
/** @var int */
public $height = 0;
/** @var String */
public $mime = "image/jpeg";
/** @var Object */
public $data;
/** @var int maximum = 100 */
public $quality = 90;
/** @var boolean Default=true */
public $doSharpen = true;
/** @var boolean Default=false */
public $maintainAspect = false;
/** @var String font path */
public $font;
/** @var int color code */
public $fontcolor;
/** @var int default=5 */
public $fontsize=5;
/**
 * Class Constructor
 * This returns the Canvas class object
 * @param int $width
 * @param int $height
 * @param String $mime Optional Default="image/jpeg"
 * @return Canvas
 */
public function Canvas($width,$height,$mime="image/jpeg"){ }
/**
 * Set Aspect Ratio Property True 
 */
public function setAspectRatio(){}
/**
 * Set Font File path
 * @param String $fontFile 
 */
public function setFont($fontFile){}
public function setFontSize($fontSize){}
/**
 *
 * @param int $red
 * @param int $green
 * @param int $blue
 * @param int $alpha Optional Default=0
 */
public function setFontColor($red,$green,$blue,$alpha=0){}
/**
 *
 * @param gd.image.source $image
 * @param int $x
 * @param int $y
 * @param int $width
 * @param int $height 
 */
public function drawImage($image,$x,$y,$width,$height){}
/**
 *
 * @param gd.image.source $image
 * @param int $dst_x
 * @param int $dst_y
 * @param int $x
 * @param int $y
 * @param int $dst_width
 * @param int $dst_height
 * @param int $width
 * @param int $height 
 */
public function drawImageOver($image,$dst_x,$dst_y,$x,$y,$dst_width,$dst_height,$width,$height){}
/**
 *
 * @param int $x
 * @param int $y
 * @param String $string Text for Draw 
 */
public function drawString($x,$y,$string){}
/**
 *
 * @param String $path 
 */
public function saveImage($path){}
/**
 *
 * @return ImageObject 
 */
public function getImageDataStreem(){}

function getOutputFunction(){}

}

?>