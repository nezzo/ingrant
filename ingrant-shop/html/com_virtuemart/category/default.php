<?php
/**
 *
 * Show the products in a category
 *
 * @package    VirtueMart
 * @subpackage
 * @author RolandD
 * @author Max Milbers
 * @todo add pagination
 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2004 - 2010 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * @version $Id: default.php 6556 2012-10-17 18:15:30Z kkmediaproduction $
 */

//vmdebug('$this->category',$this->category);
vmdebug ('$this->category ' . $this->category->category_name);
// Check to ensure this file is included in Joomla!
defined ('_JEXEC') or die('Restricted access');
JHTML::_ ('behavior.modal');
/* javascript for list Slide
  Only here for the order list
  can be changed by the template maker
*/
$js = "
jQuery(document).ready(function () {
	jQuery('.orderlistcontainer').hover(
		function() { jQuery(this).find('.orderlist').stop().show()},
		function() { jQuery(this).find('.orderlist').stop().hide()}
	)
});
";


$document = JFactory::getDocument ();
$document->addScriptDeclaration ($js);

/*$edit_link = '';
if(!class_exists('Permissions')) require(JPATH_VM_ADMINISTRATOR.DS.'helpers'.DS.'permissions.php');
if (Permissions::getInstance()->check("admin,storeadmin")) {
	$edit_link = '<a href="'.JURI::root().'index.php?option=com_virtuemart&tmpl=component&view=category&task=edit&virtuemart_category_id='.$this->category->virtuemart_category_id.'">
		'.JHTML::_('image', 'images/M_images/edit.png', JText::_('COM_VIRTUEMART_PRODUCT_FORM_EDIT_PRODUCT'), array('width' => 16, 'height' => 16, 'border' => 0)).'</a>';
}

echo $edit_link; */
if (empty($this->keyword)) {
	?>
<div class="category_description">
	<?php echo $this->category->category_description; ?>
</div>
<?php
}

/* Show child categories */

if (VmConfig::get ('showCategory', 1) and empty($this->keyword)) {
	if ($this->category->haschildren) {

		// Category and Columns Counter
		$iCol = 1;
		$iCategory = 1;

		// Calculating Categories Per Row
		$categories_per_row = VmConfig::get ('categories_per_row', 3);
		$category_cellwidth = ' width' . floor (100 / $categories_per_row);

		// Separator
		$verticalseparator = " vertical-separator";
		?>

		<div class="category-view">

		<?php // Start the Output
		if (!empty($this->category->children)) {
			foreach ($this->category->children as $category) {

				// Show the horizontal seperator
				if ($iCol == 1 && $iCategory > $categories_per_row) {
					?>
					<div class="horizontal-separator"></div>
					<?php
				}

				// this is an indicator wether a row needs to be opened or not
				if ($iCol == 1) {
					?>
			<div class="row">
			<?php
				}

				// Show the vertical seperator
				if ($iCategory == $categories_per_row or $iCategory % $categories_per_row == 0) {
					$show_vertical_separator = ' ';
				} else {
					$show_vertical_separator = $verticalseparator;
				}

				// Category Link
				$caturl = JRoute::_ ('index.php?option=com_virtuemart&view=category&virtuemart_category_id=' . $category->virtuemart_category_id);

				// Show Category
				?>
				<div class="category floatleft<?php echo $category_cellwidth . $show_vertical_separator ?>">
					<div class="spacer">
						<h2>
							<a href="<?php echo $caturl ?>" title="<?php echo $category->category_name ?>">
								<?php echo $category->category_name ?>
								<br/>
								<?php // if ($category->ids) {
								echo $category->images[0]->displayMediaThumb ("", FALSE);
								//} ?>
							</a>
						</h2>
					</div>
				</div>
				<?php
				$iCategory++;

				// Do we need to close the current row now?
				if ($iCol == $categories_per_row) {
					?>
					<div class="clear"></div>
		</div>
			<?php
					$iCol = 1;
				} else {
					$iCol++;
				}
			}
		}
		// Do we need a final closing row tag?
		if ($iCol != 1) {
			?>
			<div class="clear"></div>
		</div>
	<?php } ?>
	</div>

	<?php
	}
}
?>
<div class="browse-view">
<?php
if (!empty($this->keyword)) {
	?>
<h3><?php echo $this->keyword; ?></h3>
	<?php
} ?>
<?php if ($this->search !== NULL) { ?>
<form action="<?php echo JRoute::_ ('index.php?option=com_virtuemart&view=category&limitstart=0&virtuemart_category_id=' . $this->category->virtuemart_category_id); ?>" method="get">

	<!--BEGIN Search Box -->
	<div class="virtuemart_search">
		<?php echo $this->searchcustom ?>
		<br/>
		<?php echo $this->searchcustomvalues ?>
		<input name="keyword" class="inputbox" type="text" size="20" value="<?php echo $this->keyword ?>"/>
		<input type="submit" value="<?php echo JText::_ ('COM_VIRTUEMART_SEARCH') ?>" class="button" onclick="this.form.keyword.focus();"/>
	</div>
	<input type="hidden" name="search" value="true"/>
	<input type="hidden" name="view" value="category"/>

</form>
<!-- End Search Box -->
	<?php } ?>

<?php // Show child categories
if (!empty($this->products)) {
	?>
<div class="orderby-displaynumber">
	<div class="width70 floatleft">
		<?php echo $this->orderByList['orderby']; ?>
		<?php echo $this->orderByList['manufacturer']; ?>
	</div>
	<div class="width30 floatright display-number"><?php echo $this->vmPagination->getResultsCounter ();?><br/><?php echo $this->vmPagination->getLimitBox (); ?></div>
	<div class="vm-pagination">
		<?php echo $this->vmPagination->getPagesLinks (); ?>
		<span style="float:right"><?php echo $this->vmPagination->getPagesCounter (); ?></span>
	</div>

	<div class="clear"></div>
</div> <!-- end of orderby-displaynumber -->

<script type="text/javascript">
	jQuery(document).ready(function($){		$('.plitka').click(function() {
            $('.product').removeClass('prod_pl_list');
            $(this).addClass('plitka_act');
            $('.spisok').removeClass('spisok_act');
        });

        $('.spisok').click(function() {
            $('.product').addClass('prod_pl_list');
            $('.plitka').removeClass('plitka_act');
            $(this).addClass('spisok_act');
        });	});
</script>

<ul class="spis_prod_list">
	<li><span class="plitka plitka_act"></span></li>
	<li><span class="spisok"></span></li>
</ul>

<h1><?php echo $this->category->category_name; ?></h1>

	<?php
	// Category and Columns Counter
	$iBrowseCol = 1;
	$iBrowseProduct = 1;

	// Calculating Products Per Row
	$BrowseProducts_per_row = 4;
	$Browsecellwidth = ' width' . floor (100 / $BrowseProducts_per_row);

	// Separator
	$verticalseparator = " vertical-separator";

	$BrowseTotalProducts = count($this->products);

	// Start the Output
	foreach ($this->products as $product) {

		// Show the horizontal seperator
		if ($iBrowseCol == 1 && $iBrowseProduct > $BrowseProducts_per_row) {
			?>

			<?php
		}

		// this is an indicator wether a row needs to be opened or not
		if ($iBrowseCol == 1) {
			?>
        <div class="row">
	<?php
		}

		// Show the vertical seperator
		if ($iBrowseProduct == $BrowseProducts_per_row or $iBrowseProduct % $BrowseProducts_per_row == 0) {
			$show_vertical_separator = ' ';
		} else {
			$show_vertical_separator = $verticalseparator;
		}

		// Show Products
		?>
		<div class="product floatleft">
			<div class="spacer">

				<div class="center tov-top">

				    <a title="<?php echo $product->link ?>" rel="vm-additional-images" href="<?php echo $product->link; ?>">
						<?php
							echo $product->images[0]->displayMediaThumb('class="browseProductImage"', false);
						?>
					 </a>

					<!-- The "Average Customer Rating" Part -->
					<?php if ($this->showRating) { ?>
					<span class="contentpagetitle"><?php echo JText::_ ('COM_VIRTUEMART_CUSTOMER_RATING') ?>:</span>
					<br/>
					<?php
					// $img_url = JURI::root().VmConfig::get('assets_general_path').'/reviews/'.$product->votes->rating.'.gif';
					// echo JHTML::image($img_url, $product->votes->rating.' '.JText::_('COM_VIRTUEMART_REVIEW_STARS'));
					// echo JText::_('COM_VIRTUEMART_TOTAL_VOTES').": ". $product->votes->allvotes;
					?>
					<?php } ?>
 					<?php
						if ( VmConfig::get ('display_stock', 1)) { ?>
						<!-- 						if (!VmConfig::get('use_as_catalog') and !(VmConfig::get('stockhandle','none')=='none')){?> -->
						<div class="paddingtop8">
							<span class="vmicon vm2-<?php echo $product->stock->stock_level ?>" title="<?php echo $product->stock->stock_tip ?>"></span>
							<span class="stock-level"><?php echo JText::_ ('COM_VIRTUEMART_STOCK_LEVEL_DISPLAY_TITLE_TIP') ?></span>
						</div>
						<?php } ?>
				</div>

				<div class="tov-bott">

					<h2><?php echo JHTML::link ($product->link, $product->product_name); ?></h2>

					<?php // Product Short Description
					if (!empty($product->product_s_desc)) {
						?>
						<p class="product_s_desc">
							<?php echo shopFunctionsF::limitStringByWord ($product->product_s_desc, 1000, '...') ?>
						</p>

						<p class="product_s_desc_plitka">
							<?php
								$vowels = array("<br/>", "<br />", "<br>");
								//$onlyconsonants = str_replace($vowels, "", "Hello World of PHP");
								echo str_replace($vowels, ';', $product->product_s_desc);
							?>

						</p>
						<?php } ?>

					<div class="product-price marginbottom12" id="productPrice<?php echo $product->virtuemart_product_id ?>">
						<?php
						if ($this->show_prices == '1') {
							if ($product->prices['salesPrice']<=0 and VmConfig::get ('askprice', 1) and  !$product->images[0]->file_is_downloadable) {
								echo JText::_ ('COM_VIRTUEMART_PRODUCT_ASKPRICE');
							}
							//todo add config settings
							if ($this->showBasePrice) {
								echo $this->currency->createPriceDiv ('basePrice', 'COM_VIRTUEMART_PRODUCT_BASEPRICE', $product->prices);
								echo $this->currency->createPriceDiv ('basePriceVariant', 'COM_VIRTUEMART_PRODUCT_BASEPRICE_VARIANT', $product->prices);
							}
							echo $this->currency->createPriceDiv ('variantModification', 'COM_VIRTUEMART_PRODUCT_VARIANT_MOD', $product->prices);
							if (round($product->prices['basePriceWithTax'],$this->currency->_priceConfig['salesPrice'][1]) != $product->prices['salesPrice']) {
								echo '<span class="price-crossed" >' . $this->currency->createPriceDiv ('basePriceWithTax', 'COM_VIRTUEMART_PRODUCT_BASEPRICE_WITHTAX', $product->prices) . "</span>";
							}
							if (round($product->prices['salesPriceWithDiscount'],$this->currency->_priceConfig['salesPrice'][1]) != $product->prices['salesPrice']) {
								echo $this->currency->createPriceDiv ('salesPriceWithDiscount', 'COM_VIRTUEMART_PRODUCT_SALESPRICE_WITH_DISCOUNT', $product->prices);
							}
							if ($product->prices['salesPrice'] <= 0) {
								echo '<div style="text-align:center;color: #B22A2A;font-weight: bold">Цену уточняйте</div>';
							}else {
                                $db = JFactory::getDBO();
//mysql_set_charset('utf-8',$link);
                                $dol = "SELECT currency_exchange_rate FROM ilxv3_virtuemart_currencies WHERE currency_numeric_code = 840";
                                $db->setQuery($dol);
                                $dols = $db->loadAssocList();
                                $euro = "SELECT currency_exchange_rate FROM ilxv3_virtuemart_currencies WHERE currency_numeric_code = 978";
                                $db->setQuery($euro);
                                $euros = $db->loadAssocList();
								//echo $this->currency->createPriceDiv ('salesPrice', 'COM_VIRTUEMART_PRODUCT_SALESPRICE', $product->prices);
								?>
                                <div class="PricesalesPrice" style="display : block;">Цена: <span class="PricesalesPrice"><?php


                                        if($product->product_currency==47){
                                            echo ceil($product->product_price*$euros[0]['currency_exchange_rate']);
                                        }
                                        if($product->product_currency==144){
                                            echo ceil($product->product_price*$dols[0]['currency_exchange_rate']);
                                        }
                                        if($product->product_currency==199){
                                            echo ceil($product->product_price);
                                        } //print_r($product->product_length);  $pr < 5 ||
                                            //$pr = strlen($product->product_length);

                                        ?> грн<?php if($product->product_length != "0" ){echo'/'.$product->product_length;} ?></span>
                                        </div>
						<?php	}

							echo $this->currency->createPriceDiv ('priceWithoutTax', 'COM_VIRTUEMART_PRODUCT_SALESPRICE_WITHOUT_TAX', $product->prices);
							echo $this->currency->createPriceDiv ('discountAmount', 'COM_VIRTUEMART_PRODUCT_DISCOUNT_AMOUNT', $product->prices);
							echo $this->currency->createPriceDiv ('taxAmount', 'COM_VIRTUEMART_PRODUCT_TAX_AMOUNT', $product->prices);
							$unitPriceDescription = JText::sprintf ('COM_VIRTUEMART_PRODUCT_UNITPRICE', $product->product_unit);
							echo $this->currency->createPriceDiv ('unitPrice', $unitPriceDescription, $product->prices);
						} ?>

					</div>

					<p class="p-prod">
						<?php // Product Details Button
						echo JHTML::link ($product->link, JText::_ ('COM_VIRTUEMART_PRODUCT_DETAILS'), array('title' => $product->product_name, 'class' => 'product-details'));
						?>

						<!--div class="addtocart-area">

						<form method="post" class="product js-recalculate" action="<?php echo JRoute::_ ('index.php'); ?>">
					                <input name="quantity" type="hidden" value="<?php echo $step ?>" />
							<?php // Product custom_fields
							if (!empty($product->customfieldsCart)) {
								?>
								<div class="product-fields">
									<?php foreach ($product->customfieldsCart as $field) { ?>
									<div class="product-field product-field-type-<?php echo $field->field_type ?>">
										<span class="product-fields-title-wrapper"><span class="product-fields-title"><strong><?php echo JText::_ ($field->custom_title) ?></strong></span>
										<?php if ($field->custom_tip) {
										echo JHTML::tooltip ($field->custom_tip, JText::_ ($field->custom_title), 'tooltip.png');
									} ?></span>
										<span class="product-field-display"><?php echo $field->display ?></span>

										<span class="product-field-desc"><?php echo $field->custom_field_desc ?></span>
									</div><br/>
									<?php
								}
									?>
								</div>
								<?php
							}
							/* Product custom Childs
								 * to display a simple link use $field->virtuemart_product_id as link to child product_id
								 * custom_value is relation value to child
								 */

							if (!empty($product->customsChilds)) {
								?>
								<div class="product-fields">
									<?php foreach ($product->customsChilds as $field) { ?>
									<div class="product-field product-field-type-<?php echo $field->field->field_type ?>">
										<span class="product-fields-title"><strong><?php echo JText::_ ($field->field->custom_title) ?></strong></span>
										<span class="product-field-desc"><?php echo JText::_ ($field->field->custom_value) ?></span>
										<span class="product-field-display"><?php echo $field->display ?></span>

									</div><br/>
									<?php } ?>
								</div>
								<?php }

							if (!VmConfig::get('use_as_catalog', 0) and !empty($product->prices['salesPrice'])) {
							?>

							<div class="addtocart-bar">

					<script type="text/javascript">
							function check(obj) {
					 		// use the modulus operator '%' to see if there is a remainder
							remainder=obj.value % <?php echo $step?>;
							quantity=obj.value;
					 		if (remainder  != 0) {
					 			alert('<?php echo $alert?>!');
					 			obj.value = quantity-remainder;
					 			return false;
					 			}
					 		return true;
					 		}
					</script>

								<?php // Display the quantity box

								$stockhandle = VmConfig::get ('stockhandle', 'none');
								if (($stockhandle == 'disableit' or $stockhandle == 'disableadd') and ($product->product_in_stock - $product->product_ordered) < 1) {
									?>
									<a href="<?php echo JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&layout=notify&virtuemart_product_id=' . $product->virtuemart_product_id); ?>" class="notify"><?php echo JText::_ ('COM_VIRTUEMART_CART_NOTIFY') ?></a>

									<?php } else { ?>
									<!-- <label for="quantity<?php echo $product->virtuemart_product_id; ?>" class="quantity_box"><?php echo JText::_ ('COM_VIRTUEMART_CART_QUANTITY'); ?>: </label> -->
									<!--span class="quantity-box">
							<input type="text" class="quantity-input js-recalculate" name="quantity[]" onblur="check(this);" value="<?php if (isset($product->step_order_level) && (int)$product->step_order_level > 0) {
								echo $product->step_order_level;
							} else if(!empty($product->min_order_level)){
								echo $product->min_order_level;
							}else {
								echo '1';
							} ?>"/>
						    </span>
									<span class="quantity-controls js-recalculate">
							<input type="button" class="quantity-controls quantity-plus"/>
							<input type="button" class="quantity-controls quantity-minus"/>
						    </span>
									<?php // Display the quantity box END ?>

									<?php
									// Display the add to cart button
									?>
									<span class="addtocart-button">
							<?php echo shopFunctionsF::getAddToCartButton ($product->orderable); ?>
							</span>
									<?php } ?>

								<div class="clear"></div>
							</div>
							<?php  } ?>

							<input type="hidden" class="pname" value="<?php echo htmlentities($product->product_name, ENT_QUOTES, 'utf-8') ?>"/>
							<input type="hidden" name="option" value="com_virtuemart"/>
							<input type="hidden" name="view" value="cart"/>
							<noscript><input type="hidden" name="task" value="add"/></noscript>
							<input type="hidden" name="virtuemart_product_id[]" value="<?php echo $product->virtuemart_product_id ?>"/>
						</form>

						<div class="clear"></div>
					</div>
					<div href="#" class="pozwonit">Позвонить</div>
					<div class="clear"></div-->

					</p>

				</div>
				<div class="clear"></div>
			</div>
			<!-- end of spacer -->
		</div> <!-- end of product -->
		<?php

		// Do we need to close the current row now?
		if ($iBrowseCol == $BrowseProducts_per_row || $iBrowseProduct == $BrowseTotalProducts) {
			?>

    </div><!-- end of row -->
			<?php
			$iBrowseCol = 1;
		} else {
			$iBrowseCol++;
		}

		$iBrowseProduct++;
	} // end of foreach ( $this->products as $product )
	// Do we need a final closing row tag?
	if ($iBrowseCol != 1) {
		?>
	<div class="clear"></div>

		<?php
	}
	?>

<div class="vm-pagination"><?php echo $this->vmPagination->getPagesLinks (); ?><span style="float:right"><?php echo $this->vmPagination->getPagesCounter (); ?></span></div>

	<?php
} elseif ($this->search !== NULL) {
	echo JText::_ ('COM_VIRTUEMART_NO_RESULT') . ($this->keyword ? ' : (' . $this->keyword . ')' : '');
}
?>
</div><!-- end browse-view -->