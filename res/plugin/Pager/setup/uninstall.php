<?php

$mysql->connect();
$sql = "DELETE FROM pagcategory WHERE spcmpid='".$_SESSION['uid']."'";
$mysql->executeQuery($sql);
$sql = "DELETE FROM pagdet WHERE spcmpid='".$_SESSION['uid']."'";
$mysql->executeQuery($sql);
//$mysql->dropTable('pagcategory');
//$mysql->dropTable('pagdet');

$mysql->disconnect();

global $libpath;
include_once "{$libpath}global/classes/DIR.php";
$dr = new DIR();
$dr->directoryDelete("pagres");

?>