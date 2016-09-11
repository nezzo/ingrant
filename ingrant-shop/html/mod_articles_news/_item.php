<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_articles_news
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
$item_heading = $params->get('item_heading', 'h4');
echo "<span class='date_news'>".date_format(date_create($item->created), 'd.m.Y')."</span>";
?>

<?php if ($params->get('item_title')) : ?>

	<<?php echo $item_heading; ?> class="newsflash-title<?php echo $params->get('moduleclass_sfx'); ?>">
	<?php if ($params->get('link_titles') && $item->link != '') : ?>
		<a href="<?php echo $item->link;?>">
			<?php  echo $item->title;?></a>
	<?php else : ?>
		<?php echo $item->title; ?>
	<?php endif; ?>
	</<?php echo $item_heading; ?>>

<?php endif; ?>

<?php if (!$params->get('intro_only')) :
	echo $item->afterDisplayTitle;
endif; ?>

<?php echo $item->beforeDisplayContent; ?>

<div class="kr-txt"><?php echo $item->introtext; ?></div>

<?php if (isset($item->link) && $item->readmore != 0 && $params->get('readmore')) :
	echo '<a class="readmore" href="'.$item->link.'">'.$item->linkText.'</a>';
endif; ?>
