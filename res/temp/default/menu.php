<menubar id="menubar1" runat="server" funsetNavbarCSS="navbar navbar-expand-md bg-dark navbar-dark">

<menu id="menum1" runat="server" caption="Home" href="<?php print $basepath; ?>">
<menuitem id="menuim1" runat="server" href="<?php print getAppPath('index') ; ?>">Home</menuitem>
<menuitem id="menuim1" runat="server" href="<?php print getEventPath('page','contacts','index'); ?>">contact us</menuitem>
</menu>

</menu>
<?php $mnu = new TempFile("plugin/cmenu.php"); $mnu->run(); $mnu->render(); ?>
</menubar>

