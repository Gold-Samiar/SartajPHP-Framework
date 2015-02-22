<div class="paghead"><?php print traceError(true); ?></div>
<div class="paghead"><?php print traceMsg(true); ?></div>
<?php if(isPlugExist()){ ?>
<a href="<?php print getEventPath('rmp',$page->evtp,'installer'); ?>">Uninstall</a>
<?php }else{?>
<a href="<?php print getEventPath('config',$page->evtp,'installer'); ?>">install</a>
<?php } ?>

