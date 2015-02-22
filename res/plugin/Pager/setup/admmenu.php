<menu id="pager1" runat="server" caption="Pages" href="<?php print getAppPath('pagecat','','',true); ?>"  >
<menuitem id="menui1" runat="server" href="<?php print getAppPath('pagecat','','',true); ?>" >Add Category</menuitem>
<menuitem id="menui1" runat="server" href="<?php print getEventPath('show','','pagecat','','',true); ?>" >List Category</menuitem>
<menuitem id="menui1" runat="server" href="<?php print getAppPath('pagea','','',true); ?>" >Add Page</menuitem>
<menuitem id="menui1" runat="server" href="<?php print getEventPath('show','','pagea','','',true); ?>" >List Pages</menuitem>
</menu>