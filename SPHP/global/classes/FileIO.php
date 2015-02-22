<?php
/**
 * Description of FileIO
 *
 * @author SARTAJ
 */
/**
 * FileIO class
 *
 * This class provide File Input Output Operations.
 * @author     Sartaj Singh
 * @copyright  2007
 * @version    4.0.0
 */
class FileIO {

public static function fileExists($filePath){}
public static function fileCreate($filePath){}
public static function fileCopy($src,$dst,$overwrite=false){}
public static function fileWrite($fileURL,$data){}
public static function fileAppend($fileURL,$data){}
public static function fileRead($fileURL){}
public static function getFileExtentionName($fileURL){}
public static function getFileName($fileURL){}
public function isFileExpired($filename,$ttl=0){}
}
?>
