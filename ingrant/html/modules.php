<?php

defined('_JEXEC') or die;

function modChrome_topmenu($module, &$params, &$attribs){
?>
	<div class="block_<?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?>">
	<?php if ($module->showtitle != 0) {?>
	    <div class="blocks-tit"><?php echo $module->title; ?></div>
	 <?php }?>
       <?php echo $module->content; ?>

</div>
<?php
}
?>