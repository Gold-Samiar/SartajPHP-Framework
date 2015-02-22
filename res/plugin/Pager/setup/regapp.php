<?php
$plugpath = getRootPath(__FILE__); 
registerApp('pagea',"{$plugpath}plugin/Pager/admin/page.php");
registerApp('pagecat', "{$plugpath}plugin/Pager/admin/categoriesw.php");
registerApp('page', "{$plugpath}plugin/Pager/index.php");
