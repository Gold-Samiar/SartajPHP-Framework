<menubar id="menubar1" runat="server" funsetNavbarCSS="navbar navbar-expand-md bg-dark navbar-dark">
<menu id="menu1" runat="server" caption="Home" href="<?php print getAppPath('mebhome'); ?>">
<menuitem id="menui1" runat="server" href="<?php print getEventPath('profile','','mebhome') ; ?>">Profile</menuitem>
<menuitem id="menui1" runat="server" href="<?php print getEventPath('page','contacts','mebhome'); ?>">contact us</menuitem>
<menuitem id="menui1" runat="server" href="<?php print getEventPath('logout','','login'); ?>">Log Out</menuitem>
</menu>
<?php $mnu = new TempFile("plugin/cmebmenu.php"); $mnu->run(); $mnu->render(); ?>
</menubar>
