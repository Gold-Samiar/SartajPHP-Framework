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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<link rel="icon" type="image/gif" href="<?php print $basepath; ?>favicon.gif" />
<?php addBootStrap();  print getHeaderHTML(); ?>
<link href="<?php print $respath; ?>temp/default/css/framework.css" rel="stylesheet"  type="text/css" />
</head>
<body>
<TABLE WIDTH=1100 BORDER=0 CELLPADDING=0 CELLSPACING=0 align="center" class="panel" style="background-color:#FFFFFF;">
	<TR>
		<TD colspan="3">
<table width="100%"><tr><td>
<h2 class="heading" style="font-size:36px;"><?php print $cmpname; ?></h2>
</td><td align="right">

</td></tr><tr><td colspan="2">
<div class="bar">
<?php print $menu->render(); ?>
</div>
</td></tr></table>
</TD></TR>	<TR>
		<TD COLSPAN="3" width="1100" valign="top" class="padding-left padding-right">
<?php $dynData->render(); ?>
</TD>
	</TR>

</TABLE>

<?php print getFooterHTML(); print traceError(); print traceErrorInner(); ?>
</body>
</html>
