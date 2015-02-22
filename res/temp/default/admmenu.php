<div class="heading">
<div>
<menubar id="menubar1" runat="server">

<menu id="menu1" runat="server" caption="Admin" href="#">
<menuitem id="menui1" runat="server" href="<?php print getAppPath('installer') ; ?>">Plugin Home</menuitem>
<menuitem id="menui1" runat="server" href="<?php print getEventPath('logout','','admlogin','','',true); ?>">Log Out</menuitem>
</menu>
<?php $mnu = new TempFile("plugin/cadmmenu.php"); $mnu->run(); $mnu->render(); ?>
</menubar>
</div><div style="clear:both"></div></div>