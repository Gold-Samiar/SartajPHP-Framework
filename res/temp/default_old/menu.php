<div class="heading">
<div>
<menubar id="menubar1" runat="server">

<menu id="menu1" runat="server" caption="Home" href="<?php print getAppPath('index'); ?>">
<menuitem id="menui1" runat="server" href="<?php print getAppPath('index') ; ?>">Home</menuitem>
<menuitem id="menui1" runat="server" href="<?php print getEventPath('page','contacts','index'); ?>">contact us</menuitem>
</menu>
<?php $mnu = new TempFile("plugin/cmenu.php"); $mnu->run(); $mnu->render(); ?>
</menubar>

</div><div style="clear:both;"></div></div>