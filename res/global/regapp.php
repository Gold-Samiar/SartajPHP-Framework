<?php
registerApp('index',"{$phppath}apps/index.php");
registerApp('error',"{$phppath}apps/err.php");
registerApp('admin',"{$phppath}apps/auth/admlogin.php");
registerApp('admlogin',"{$phppath}apps/auth/admlogin.php");
registerApp('admhome',"{$phppath}apps/auth/admhome.php");
registerApp('installer',"{$phppath}apps/plugins/installer.php");
include_once("plugin/creg.php");
