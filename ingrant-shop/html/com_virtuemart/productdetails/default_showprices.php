<?php
/**
 *
 * Show the product details page
 *
 * @package    VirtueMart
 * @subpackage
 * @author Max Milbers, Valerie Isaksen
 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2004 - 2010 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * @version $Id: default_showprices.php 6556 2012-10-17 18:15:30Z kkmediaproduction $
 */
// Check to ensure this file is included in Joomla!
defined ('_JEXEC') or die('Restricted access');
$db = JFactory::getDBO();
//mysql_set_charset('utf-8',$link);
$dol = "SELECT currency_exchange_rate FROM ilxv3_virtuemart_currencies WHERE currency_numeric_code = 840";
$db->setQuery($dol);
$dols = $db->loadAssocList();

$euro = "SELECT currency_exchange_rate FROM ilxv3_virtuemart_currencies WHERE currency_numeric_code = 978";
$db->setQuery($euro);
$euros = $db->loadAssocList();

?>
<div class="product-price" id="productPrice<?php echo $this->product->virtuemart_product_id ?>">
	<?php
	if (!empty($this->product->prices['salesPrice'])) {

	}
	//vmdebug('view productdetails layout default show prices, prices',$this->product);
	if ($this->product->prices['salesPrice']<=0 and VmConfig::get ('askprice', 1) and isset($this->product->images[0]) and !$this->product->images[0]->file_is_downloadable) {
		?>
		<a class="ask-a-question bold" href="<?php echo $this->askquestion_url ?>"><?php echo JText::_ ('COM_VIRTUEMART_PRODUCT_ASKPRICE') ?></a>
		<?php
	} else {
	if ($this->showBasePrice) {
		echo $this->currency->createPriceDiv ('basePrice', 'COM_VIRTUEMART_PRODUCT_BASEPRICE', $this->product->prices);
		if (round($this->product->prices['basePrice'],$this->currency->_priceConfig['basePriceVariant'][1]) != $this->product->prices['basePriceVariant']) {
			echo $this->currency->createPriceDiv ('basePriceVariant', 'COM_VIRTUEMART_PRODUCT_BASEPRICE_VARIANT', $this->product->prices);
		}

	}
	echo $this->currency->createPriceDiv ('variantModification', 'COM_VIRTUEMART_PRODUCT_VARIANT_MOD', $this->product->prices);
	if (round($this->product->prices['basePriceWithTax'],$this->currency->_priceConfig['salesPrice'][1]) != $this->product->prices['salesPrice']) {
		echo '<span class="price-crossed" >' . $this->currency->createPriceDiv ('basePriceWithTax', 'COM_VIRTUEMART_PRODUCT_BASEPRICE_WITHTAX', $this->product->prices) . "</span>";
	}
	if (round($this->product->prices['salesPriceWithDiscount'],$this->currency->_priceConfig['salesPrice'][1]) != $this->product->prices['salesPrice']) {
		echo $this->currency->createPriceDiv ('salesPriceWithDiscount', 'COM_VIRTUEMART_PRODUCT_SALESPRICE_WITH_DISCOUNT', $this->product->prices);
	}
	if ($this->product->prices['salesPrice'] <= 0) {
								echo '<div style="text-align:center;color: #B22A2A;font-weight: bold">Цену уточняйте</div>';
							}else { //echo $this->currency->createPriceDiv ('salesPrice', 'COM_VIRTUEMART_PRODUCT_SALESPRICE', $this->product->prices);?>


        <div class="PricesalesPrice" style="display : block;">Цена: <span class="PricesalesPrice"><?php
                if($this->product->product_currency==47){
                    echo ceil($this->product->product_price*$euros[0]['currency_exchange_rate']);
                }
                if($this->product->product_currency==144){
                    echo ceil($this->product->product_price*$dols[0]['currency_exchange_rate']);
                }
                if($this->product->product_currency==199){
                    echo ceil($this->product->product_price);
                }


                ?> грн<?php if($this->product->product_length != "0" ){echo'/'.$this->product->product_length;} ?></span></div>
							<?php }
       // echo $this->product->product_currency;
	echo $this->currency->createPriceDiv ('priceWithoutTax', 'COM_VIRTUEMART_PRODUCT_SALESPRICE_WITHOUT_TAX', $this->product->prices);

	echo $this->currency->createPriceDiv ('discountAmount', 'COM_VIRTUEMART_PRODUCT_DISCOUNT_AMOUNT', $this->product->prices);
	echo $this->currency->createPriceDiv ('taxAmount', 'COM_VIRTUEMART_PRODUCT_TAX_AMOUNT', $this->product->prices);
	$unitPriceDescription = JText::sprintf ('COM_VIRTUEMART_PRODUCT_UNITPRICE', JText::_('COM_VIRTUEMART_UNIT_SYMBOL_'.$this->product->product_unit));
	echo $this->currency->createPriceDiv ('unitPrice', $unitPriceDescription, $this->product->prices);
	}
	?>
</div>
