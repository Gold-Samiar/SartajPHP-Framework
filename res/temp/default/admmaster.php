<?php 
switch($page->getAuthenticateType()){
case 'GUEST':{
$menu = new TempFile("{$phppath}temp/default/menu.php"); $menu->run();
break;
}
case 'ADMIN':{
$menu = new TempFile("{$phppath}temp/default/admmenu.php"); $menu->run();
break;
}
case 'MEMBER':{
$menu = new TempFile("{$phppath}temp/default/mebmenu.php"); $menu->run();
break;
}
case 'DEALER':{
$menu = new TempFile("{$phppath}temp/default/delmenu.php"); $menu->run();
break;
}
}
?><!DOCTYPE html>
<html>
<head lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php SphpJsM::addjQueryUI(); SphpJsM::addBootStrap();  print getHeaderHTML(); ?>
<link href="<?php print $respath; ?>temp/default/css/framework.css" rel="stylesheet"  type="text/css" />
<link rel="icon" type="image/gif" href="<?php print $basepath; ?>favicon.gif" />
</head>
<body>
    <div class="container">
        <div class="row"><div class="col panel">
        <div class="row"><div class="col">
<h2 class="heading" style="font-size:36px;"><?php print $cmpname; ?></h2>
            </div></div>
 <div class="row"><div class="col">
<?php print $menu->render(); ?>
    </div></div>
<div class="row"><div class="col">        
<?php $dynData->render(); ?>
</div>
</div>
            </div></div></div>
<?php print getFooterHTML(); print traceError(); print traceErrorInner(); ?>
</body>
</html>
