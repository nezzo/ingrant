<?php

defined('_JEXEC') or die;

function modChrome_rightmenu($module, &$params, &$attribs){
?>
	<div class="block_<?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?>">
	<?php if ($module->showtitle != 0) {?>
	    <div class="menu-tit"><?php echo $module->title; ?></div>
	 <?php }?>
       <?php echo $module->content; ?>

</div>


<?php
}
?>

<?php
function modChrome_spectit($module, &$params, &$attribs){
?>
	<div class="block_<?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?>">
	<?php if ($module->showtitle != 0) {?>
	    <div class="spec-tit"><?php echo $module->title; ?></div>
	 <?php }?>
       <?php echo $module->content; ?>

</div>


<?php
}
?>

<?php
function modChrome_ser($module, &$params, &$attribs){
?>
	<div class="block_<?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?>">
	<?php if ($module->showtitle != 0) {?>
	    <div class="spec-tit"><?php echo $module->title; ?></div>
	 <?php }?>
       <?php echo $module->content; ?>

</div>


<?php
}
?>
<?php
function modChrome_servisesleft($module, &$params, &$attribs){
?>
	<div class="block_<?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?>">
	<?php if ($module->showtitle != 0) {?>
	    <div class="spec-tit"><?php echo $module->title; ?></div>
	 <?php }?>
       <?php echo $module->content; ?>

</div>


<?php
}
?>

<?php
function modChrome_poisk($module, &$params, &$attribs){
?>
	<div class="block<?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?>">
	<?php if ($module->showtitle != 0) {?>
	    <div class="poisk-tit"><?php echo $module->title; ?></div>
	 <?php }?>
       <?php echo $module->content; ?>

</div>


<?php
}
?>