<?php
/**
 *
 * Show the product details page
 *
 * @package	VirtueMart
 * @subpackage
 * @author Max Milbers, Eugen Stranz
 * @author RolandD,
 * @todo handle child products
 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2004 - 2010 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * @version $Id: default.php 6530 2012-10-12 09:40:36Z alatak $
 */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');





// addon for joomla modal Box
JHTML::_('behavior.modal');
// JHTML::_('behavior.tooltip');
$document = JFactory::getDocument();
$document->addScriptDeclaration("
//<![CDATA[
	jQuery(document).ready(function($) {
		$('a.ask-a-question').click( function(){
			$.facebox({
				iframe: '" . $this->askquestion_url . "',
				rev: 'iframe|550|550'
			});
			return false ;
		});
	/*	$('.additional-images a').mouseover(function() {
			var himg = this.href ;
			var extension=himg.substring(himg.lastIndexOf('.')+1);
			if (extension =='png' || extension =='jpg' || extension =='gif') {
				$('.main-image img').attr('src',himg );
			}
			console.log(extension)
		});*/
	});
//]]>
");
/* Let's see if we found the product */
if (empty($this->product)) {
    echo JText::_('COM_VIRTUEMART_PRODUCT_NOT_FOUND');
    echo '<br /><br />  ' . $this->continue_link_html;
    return;
}

	$lang =& JFactory::getLanguage();
	$yaz = $lang->getTag();
?>

<div class="productdetails-view productdetails">

    <?php
    // Product Navigation
    if (VmConfig::get('product_navigation', 1)) {
	?>
        <div class="product-neighbours">
	    <?php
	    if (!empty($this->product->neighbours ['previous'][0])) {
		$prev_link = JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $this->product->neighbours ['previous'][0] ['virtuemart_product_id'] . '&virtuemart_category_id=' . $this->product->virtuemart_category_id);
		echo JHTML::_('link', $prev_link, $this->product->neighbours ['previous'][0]
			['product_name'], array('class' => 'previous-page'));
	    }
	    if (!empty($this->product->neighbours ['next'][0])) {
		$next_link = JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $this->product->neighbours ['next'][0] ['virtuemart_product_id'] . '&virtuemart_category_id=' . $this->product->virtuemart_category_id);
		echo JHTML::_('link', $next_link, $this->product->neighbours ['next'][0] ['product_name'], array('class' => 'next-page'));
	    }
	    ?>
    	<div class="clear"></div>
        </div>
    <?php } // Product Navigation END
    ?>

	<?php // Back To Category Button
	if ($this->product->virtuemart_category_id) {
		$catURL =  JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id='.$this->product->virtuemart_category_id);
		$categoryName = $this->product->category_name ;
	} else {
		$catURL =  JRoute::_('index.php?option=com_virtuemart');
		$categoryName = jText::_('COM_VIRTUEMART_SHOP_HOME') ;
	}
	?>
	<!--div class="back-to-category">
    	<a href="<?php echo $catURL ?>" class="product-details" title="<?php echo $categoryName ?>"><?php echo JText::sprintf('COM_VIRTUEMART_CATEGORY_BACK_TO',$categoryName) ?></a>
	</div-->

    <?php // Product Title   ?>
    <h1><?php echo $this->product->product_name ?></h1>
    <?php // Product Title END   ?>

    <?php // afterDisplayTitle Event
    echo $this->product->event->afterDisplayTitle ?>

    <?php
    // Product Edit Link
    echo $this->edit_link;
    // Product Edit Link END
    ?>

    <?php
    // PDF - Print - Email Icon
    if (VmConfig::get('show_emailfriend') || VmConfig::get('show_printicon') || VmConfig::get('pdf_button_enable')) {
	?>
        <div class="icons">
	    <?php
	    //$link = (JVM_VERSION===1) ? 'index2.php' : 'index.php';
	    $link = 'index.php?tmpl=component&option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $this->product->virtuemart_product_id;
	    $MailLink = 'index.php?option=com_virtuemart&view=productdetails&task=recommend&virtuemart_product_id=' . $this->product->virtuemart_product_id . '&virtuemart_category_id=' . $this->product->virtuemart_category_id . '&tmpl=component';

	    if (VmConfig::get('pdf_icon', 1) == '1') {
		echo $this->linkIcon($link . '&format=pdf', 'COM_VIRTUEMART_PDF', 'pdf_button', 'pdf_button_enable', false);
	    }
	    echo $this->linkIcon($link . '&print=1', 'COM_VIRTUEMART_PRINT', 'printButton', 'show_printicon');
	    echo $this->linkIcon($MailLink, 'COM_VIRTUEMART_EMAIL', 'emailButton', 'show_emailfriend');
	    ?>
    	<div class="clear"></div>
        </div>
    <?php } // PDF - Print - Email Icon END
    ?>

  	<?php
    if (!empty($this->product->customfieldsSorted['ontop'])) {
	$this->position = 'ontop';
	echo $this->loadTemplate('customfields');
    } // Product Custom ontop end
    ?>

    <div>
	<div class="width56 floatleft">
<?php
echo $this->loadTemplate('images');
?>
	</div>

	<div class="width40 floatright">
	    <div class="spacer-buy-area">

		<?php
		// TODO in Multi-Vendor not needed at the moment and just would lead to confusion
		/* $link = JRoute::_('index2.php?option=com_virtuemart&view=virtuemart&task=vendorinfo&virtuemart_vendor_id='.$this->product->virtuemart_vendor_id);
		  $text = JText::_('COM_VIRTUEMART_VENDOR_FORM_INFO_LBL');
		  echo '<span class="bold">'. JText::_('COM_VIRTUEMART_PRODUCT_DETAILS_VENDOR_LBL'). '</span>'; ?><a class="modal" href="<?php echo $link ?>"><?php echo $text ?></a><br />
		 */
		?>

		<?php
		if ($this->showRating) {
		    $maxrating = VmConfig::get('vm_maximum_rating_scale', 5);

		    if (empty($this->rating)) {
			?>
			<span class="vote"><?php echo JText::_('COM_VIRTUEMART_RATING') . ' ' . JText::_('COM_VIRTUEMART_UNRATED') ?></span>
			    <?php
			} else {
			    $ratingwidth = $this->rating->rating * 24; //I don't use round as percetntage with works perfect, as for me
			    ?>
			<span class="vote">
	<?php echo JText::_('COM_VIRTUEMART_RATING') . ' ' . round($this->rating->rating) . '/' . $maxrating; ?><br/>
			    <span title=" <?php echo (JText::_("COM_VIRTUEMART_RATING_TITLE") . round($this->rating->rating) . '/' . $maxrating) ?>" class="ratingbox" style="display:inline-block;">
				<span class="stars-orange" style="width:<?php echo $ratingwidth.'px'; ?>">
				</span>
			    </span>
			</span>

			<?php
		    }
		}
		if (is_array($this->productDisplayShipments)) {
		    foreach ($this->productDisplayShipments as $productDisplayShipment) {
			echo $productDisplayShipment . '<br />';
		    }
		}
		if (is_array($this->productDisplayPayments)) {
		    foreach ($this->productDisplayPayments as $productDisplayPayment) {
			echo $productDisplayPayment . '<br />';
		    }
		}
		echo $this->product->product_s_desc.'<br /><br />';

		// Product Price
		    // the test is done in show_prices
		//if ($this->show_prices and (empty($this->product->images[0]) or $this->product->images[0]->file_is_downloadable == 0)) {
		    echo $this->loadTemplate('showprices');
		//}
		?>


				<?php
               	if ($yaz=="en-GB")
              	{?>
              		<div href="#" onclick="jQuery('#divwin_call').css({'top':'150px', 'left':'30%'}); wObj=document.getElementById('divwin_call'); wObj.style.opacity=1; wObj.style.display='block'; op=0; appear();" class="pozwonit">Сall</div>
		<div class="divwin" id="divwin_call">
			<div class="closeButton" onclick="wObj.style.display='none';"><img src="images/fancy_close.png" /></div>

				<div class="rsform">
					<form method="post" id="userForm" action="" onsubmit="return myValidation()">
						<div class="componentheading">
							Call: <br /> <span class="trybk"> (044) 383 56 00 </ span> <br />
							or <br />
							Request a call back
						</div>

							<table border="0">
								<tbody>
								<tr class="rsform-block rsform-block-name">
									<td>Enter your name:</td>
									<td><input type="text" value="" size="20" name="name" id="name" class="rsform-input-box"><div class="formClr"></div></td>
									<td></td>
								</tr>
								<tr class="rsform-block rsform-block-telefon">
									<td>Your phone number *:</td>
									<td><input type="text" value="" size="20" name="telefon" id="telefon" class="rsform-input-box"><div class="formClr"></div><span id="component24" class="erro">Введите номер телефона</span></td>
									<td></td>
								</tr>
								<tr class="rsform-block rsform-block-otpravit">
									<td></td>
									<td><input type="submit" value="Send" name="otpravit" id="otpravit" class="rsform-submit-button"><div class="formClr"></div></td>
									<td></td>
								</tr>
							</tbody>
							</table>
					<input type="hidden" name="prod_name" value="<?=$this->product->product_name?>">
				</form>
				</div>
		</div>
<style>
	.erro {
		display:none;
		color: red;
		font-weight: bold;

	}
</style>
<script type="text/javascript">
	function appear() {
		if(op < 1) {
			op += 0.1;
			wObj.style.opacity = op;
			wObj.style.filter='alpha(opacity='+op*100+')';
			t = setTimeout('appear()', 30);
		}
	}
	function myValidation() {
			var phone = jQuery('#divwin_call').find('input[name=telefon]').val();
			//var phone_buy = jQuery('#divwin_buy').find('input[name=telefon_buy]').val();

			if(phone.length == 0){
				jQuery('.erro').css('display','block');

				return false;
			}else {

				return true;
			}

		}
		function myValidation_buy() {
			var phone = jQuery('#divwin_buy').find('input[name=telefon_buy]').val();
			//var phone_buy = jQuery('#divwin_buy').find('input[name=telefon_buy]').val();

			if(phone_buy.length == 0){
				jQuery('.erro').css('display','block');

				return false;
			}else {

				return true;
			}

		}
</script>


<?php
if( isset($_POST['otpravit']) ) {
				$db =& JFactory::getDBO();
                $sql = "SELECT email FROM #__users WHERE id = 42";
                $res = $db->setQuery($sql)->loadObjectList();
				$mailer = JFactory::getMailer();
				$config = JFactory::getConfig();
				$sender = array($config->getValue('config.mailfrom'), $config->getValue('config.fromname') );
				$mailer->setSender($sender);
				$subject = 'Заказ звонка по товару';
				$mailer->setSubject($subject);

				//$recipient[] = 'alfressko@gmail.com';	// Почтовый ящик администратора
				$recipient[] = $res[0]->email;
				//die($res[0]->email);
				$mailer->addRecipient($recipient);


				$body = "<table border='1' cellspacing='10' cellpadding='10'>
							<tr>
								<td colspan='2'>Order a call about this item <a href='".substr(JURI::base(), 0, strlen(JURI::base())-1)."".$this->product->link."'>".$this->product->product_name."</a></td>
							</tr>

							<tr>
								<td>Name</td>
								<td>".$_POST['name']."</td>
							</tr>
							<tr>
								<td>Phone</td>
								<td>".$_POST['telefon']."</td>
							</tr>


						</table>";

				$mailer->isHTML(true);
				$mailer->setBody($body);

				$send = $mailer->Send();

				if ($send !== true) {
					echo 'Error sending email: '.$send->get('message');
				}
                 else {

					echo '<script>alert("Thank you, your order is accepted.");</script>';
                  }
}
		// Add To Cart Button
// 			if (!empty($this->product->prices) and !empty($this->product->images[0]) and $this->product->images[0]->file_is_downloadable==0 ) {
//		if (!VmConfig::get('use_as_catalog', 0) and !empty($this->product->prices['salesPrice'])) {
		    echo $this->loadTemplate('addtocart');
//		}  // Add To Cart Button END
		?>
               <?php
               }
				?>

				<?php
               	if ($yaz=="uk-UA")
              	{?>
              		<div href="#" onclick="jQuery('#divwin_call').css({'top':'150px', 'left':'30%'}); wObj=document.getElementById('divwin_call'); wObj.style.opacity=1; wObj.style.display='block'; op=0; appear();" class="pozwonit">Подзвонити</div>
		<div class="divwin" id="divwin_call">
			<div class="closeButton" onclick="wObj.style.display='none';"><img src="images/fancy_close.png" /></div>

				<div class="rsform">
					<form method="post" id="userForm" action="" onsubmit="return myValidation()">
						<div class="componentheading">
							Подзвонити: <br /> <span class="trybk"> (044) 383 56 00 </ span> <br />
							або <br />
							Замовити зворотній дзвінок
						</div>

							<table border="0">
								<tbody>
								<tr class="rsform-block rsform-block-name">
									<td>Введіть Ваше ім'я:</td>
									<td><input type="text" value="" size="20" name="name" id="name" class="rsform-input-box"><div class="formClr"></div></td>
									<td></td>
								</tr>
								<tr class="rsform-block rsform-block-telefon">
									<td>Ваш телефон *:</td>
									<td><input type="text" value="" size="20" name="telefon" id="telefon" class="rsform-input-box"><div class="formClr"></div><span id="component24" class="erro">Введите номер телефона</span></td>
									<td></td>
								</tr>
								<tr class="rsform-block rsform-block-otpravit">
									<td></td>
									<td><input type="submit" value="Надіслати" name="otpravit" id="otpravit" class="rsform-submit-button"><div class="formClr"></div></td>
									<td></td>
								</tr>
							</tbody>
							</table>
					<input type="hidden" name="prod_name" value="<?=$this->product->product_name?>">
				</form>
				</div>
		</div>
<style>
	.erro {
		display:none;
		color: red;
		font-weight: bold;

	}
</style>
<script type="text/javascript">
	function appear() {
		if(op < 1) {
			op += 0.1;
			wObj.style.opacity = op;
			wObj.style.filter='alpha(opacity='+op*100+')';
			t = setTimeout('appear()', 30);
		}
	}
	function myValidation() {
			var phone = jQuery('#divwin_call').find('input[name=telefon]').val();
			//var phone_buy = jQuery('#divwin_buy').find('input[name=telefon_buy]').val();

			if(phone.length == 0){
				jQuery('.erro').css('display','block');

				return false;
			}else {

				return true;
			}

		}
		function myValidation_buy() {
			var phone = jQuery('#divwin_buy').find('input[name=telefon_buy]').val();
			//var phone_buy = jQuery('#divwin_buy').find('input[name=telefon_buy]').val();

			if(phone_buy.length == 0){
				jQuery('.erro').css('display','block');

				return false;
			}else {

				return true;
			}

		}
</script>


<?php
if( isset($_POST['otpravit']) ) {
				$db =& JFactory::getDBO();
                $sql = "SELECT email FROM #__users WHERE id = 42";
                $res = $db->setQuery($sql)->loadObjectList();
				$mailer = JFactory::getMailer();
				$config = JFactory::getConfig();
				$sender = array($config->getValue('config.mailfrom'), $config->getValue('config.fromname') );
				$mailer->setSender($sender);
				$subject = 'Заказ звонка по товару';
				$mailer->setSubject($subject);

				//$recipient[] = 'alfressko@gmail.com';	// Почтовый ящик администратора
				$recipient[] = $res[0]->email;
				//die($res[0]->email);
				$mailer->addRecipient($recipient);


				$body = "<table border='1' cellspacing='10' cellpadding='10'>
							<tr>
								<td colspan='2'>Замовлення дзвінка по товару <a href='".substr(JURI::base(), 0, strlen(JURI::base())-1)."".$this->product->link."'>".$this->product->product_name."</a></td>
							</tr>

							<tr>
								<td>Ім'я</td>
								<td>".$_POST['name']."</td>
							</tr>
							<tr>
								<td>Телефон</td>
								<td>".$_POST['telefon']."</td>
							</tr>


						</table>";

				$mailer->isHTML(true);
				$mailer->setBody($body);

				$send = $mailer->Send();

				if ($send !== true) {
					echo 'Error sending email: '.$send->get('message');
				}
                 else {

					echo '<script>alert("Спасибі, Ваше замовлення прийнято.");</script>';
                  }
}
		// Add To Cart Button
// 			if (!empty($this->product->prices) and !empty($this->product->images[0]) and $this->product->images[0]->file_is_downloadable==0 ) {
//		if (!VmConfig::get('use_as_catalog', 0) and !empty($this->product->prices['salesPrice'])) {
		    echo $this->loadTemplate('addtocart');
//		}  // Add To Cart Button END
		?>
               <?php
               }
				?>

				<?php
               	if ($yaz=="ru-RU")
              	{?>
              		<div href="#" onclick="jQuery('#divwin_call').css({'top':'150px', 'left':'30%'}); wObj=document.getElementById('divwin_call'); wObj.style.opacity=1; wObj.style.display='block'; op=0; appear();" class="pozwonit">Позвонить</div>
		<div class="divwin" id="divwin_call">
			<div class="closeButton" onclick="wObj.style.display='none';"><img src="images/fancy_close.png" /></div>

				<div class="rsform">
					<form method="post" id="userForm" action="" onsubmit="return myValidation()">
						<div class="componentheadings">
							Позвонить : <br /><span class="trybk">(044) 383 56 00</span> <br />
							или <br />
							Заказать обратный звонок
						</div>

							<table border="0">
								<tbody>
								<tr class="rsform-block rsform-block-name">
									<td>Введите Ваше имя:</td>
									<td><input type="text" value="" size="20" name="name" id="name" class="rsform-input-box"><div class="formClr"></div></td>
									<td></td>
								</tr>
								<tr class="rsform-block rsform-block-telefon">
									<td>Ваш телефон *:</td>
									<td><input type="text" value="" size="20" name="telefon" id="telefon" class="rsform-input-box"><div class="formClr"></div><span id="component24" class="erro">Введите номер телефона</span></td>
									<td></td>
								</tr>
								<tr class="rsform-block rsform-block-otpravit">
									<td></td>
									<td><input type="submit" value="Отправить" name="otpravit" id="otpravit" class="rsform-submit-button"><div class="formClr"></div></td>
									<td></td>
								</tr>
							</tbody>
							</table>
					<input type="hidden" name="prod_name" value="<?=$this->product->product_name?>">
				</form>
				</div>
		</div>
<style>
	.erro {
		display:none;
		color: red;
		font-weight: bold;

	}
</style>
<script type="text/javascript">
	function appear() {
		if(op < 1) {
			op += 0.1;
			wObj.style.opacity = op;
			wObj.style.filter='alpha(opacity='+op*100+')';
			t = setTimeout('appear()', 30);
		}
	}
	function myValidation() {
			var phone = jQuery('#divwin_call').find('input[name=telefon]').val();
			//var phone_buy = jQuery('#divwin_buy').find('input[name=telefon_buy]').val();

			if(phone.length == 0){
				jQuery('.erro').css('display','block');

				return false;
			}else {

				return true;
			}

		}
		function myValidation_buy() {
			var phone = jQuery('#divwin_buy').find('input[name=telefon_buy]').val();
			//var phone_buy = jQuery('#divwin_buy').find('input[name=telefon_buy]').val();

			if(phone_buy.length == 0){
				jQuery('.erro').css('display','block');

				return false;
			}else {

				return true;
			}

		}
</script>


<?php
if( isset($_POST['otpravit']) ) {
				$db =& JFactory::getDBO();
                $sql = "SELECT email FROM #__users WHERE id = 42";
                $res = $db->setQuery($sql)->loadObjectList();
				$mailer = JFactory::getMailer();
				$config = JFactory::getConfig();
				$sender = array($config->getValue('config.mailfrom'), $config->getValue('config.fromname') );
				$mailer->setSender($sender);
				$subject = 'Заказ звонка по товару';
				$mailer->setSubject($subject);

				$recipient[] = 'infoingrant@gmail.com';	// Почтовый ящик администратора
			//	$recipient[] = $res[0]->email;
				//die($res[0]->email);
				$mailer->addRecipient($recipient);


				$body = "<table border='1' cellspacing='10' cellpadding='10'>
							<tr>
								<td colspan='2'>Заказ звонка по товару <a href='".substr(JURI::base(), 0, strlen(JURI::base())-1)."".$this->product->link."'>".$this->product->product_name."</a></td>
							</tr>

							<tr>
								<td>Имя</td>
								<td>".$_POST['name']."</td>
							</tr>
							<tr>
								<td>Телефон</td>
								<td>".$_POST['telefon']."</td>
							</tr>


						</table>";

				$mailer->isHTML(true);
				$mailer->setBody($body);

				$send = $mailer->Send();

				if ($send !== true) {
					echo 'Error sending email: '.$send->get('message');
				}
                 else {

					echo '<script>alert("Спacибo, Вaш зaкaз пpинят.");</script>';
                  }
}
		// Add To Cart Button
// 			if (!empty($this->product->prices) and !empty($this->product->images[0]) and $this->product->images[0]->file_is_downloadable==0 ) {
//		if (!VmConfig::get('use_as_catalog', 0) and !empty($this->product->prices['salesPrice'])) {
		    echo $this->loadTemplate('addtocart');
//		}  // Add To Cart Button END
		?>
               <?php
               }
				?>
		<div class="clear"></div>

		<?php

		// Availability Image
		$stockhandle = VmConfig::get('stockhandle', 'none');
		if (($this->product->product_in_stock - $this->product->product_ordered) < 1) {
			if ($stockhandle == 'risetime' and VmConfig::get('rised_availability') and empty($this->product->product_availability)) {
			?>	<div class="availability">
			    <?php echo (file_exists(JPATH_BASE . DS . VmConfig::get('assets_general_path') . 'images/availability/' . VmConfig::get('rised_availability'))) ? JHTML::image(JURI::root() . VmConfig::get('assets_general_path') . 'images/availability/' . VmConfig::get('rised_availability', '7d.gif'), VmConfig::get('rised_availability', '7d.gif'), array('class' => 'availability')) : VmConfig::get('rised_availability'); ?>
			</div>
		    <?php
			} else if (!empty($this->product->product_availability)) {
			?>
			<div class="availability">
			<?php echo (file_exists(JPATH_BASE . DS . VmConfig::get('assets_general_path') . 'images/availability/' . $this->product->product_availability)) ? JHTML::image(JURI::root() . VmConfig::get('assets_general_path') . 'images/availability/' . $this->product->product_availability, $this->product->product_availability, array('class' => 'availability')) : $this->product->product_availability; ?>
			</div>
			<?php
			}
		}
		?>

<?php
// Ask a question about this product
if (VmConfig::get('ask_question', 1) == 1) {
    ?>
    		<div class="ask-a-question">
    		    <a class="ask-a-question" href="<?php echo $this->askquestion_url ?>" ><?php echo JText::_('COM_VIRTUEMART_PRODUCT_ENQUIRY_LBL') ?></a>
    		    <!--<a class="ask-a-question modal" rel="{handler: 'iframe', size: {x: 700, y: 550}}" href="<?php echo $this->askquestion_url ?>"><?php echo JText::_('COM_VIRTUEMART_PRODUCT_ENQUIRY_LBL') ?></a>-->
    		</div>
		<?php }
		?>

		<?php
		// Manufacturer of the Product
		if (VmConfig::get('show_manufacturers', 1) && !empty($this->product->virtuemart_manufacturer_id)) {
		    echo $this->loadTemplate('manufacturer');
		}
		?>

	    </div>
	</div>
	<div class="clear"></div>
    </div>

	<?php // event onContentBeforeDisplay
	echo $this->product->event->beforeDisplayContent; ?>

	<link type="text/css" href="/templates/ingrant-shop/css/jquery-ui-1.8.18.custom.css" rel="stylesheet" />

	<script type="text/javascript" src="/templates/ingrant-shop/js/jquery-ui-1.8.18.custom.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			// Tabs
			$('#tabs').tabs();
		});
	</script>

	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Описание </a></li>
			<li><a href="#tabs-2">Технические характеристики </a></li>
			<li><a href="#tabs-3">Доставка </a></li>
			<li><a href="#tabs-4">Отзывы </a></li>
		</ul>
		<div id="tabs-1">
			<?php
			// Product Description
			if (!empty($this->product->product_desc)) {
			    ?>
		        <div class="product-description">
			<?php /** @todo Test if content plugins modify the product description */ ?>
		    	<!--span class="title"><?php echo JText::_('COM_VIRTUEMART_PRODUCT_DESC_TITLE') ?></span-->
			<?php echo $this->product->product_desc; ?>
		        </div>
				<div class="clear"></div>
			<?php
		    } // Product Description END
		    ?>
		</div>
		<div id="tabs-2">
			<?php
		    // Product Short Description
		    if (!empty($this->product->product_teh)) {
			?>
		        <div class="product-short-description">
			    <?php
			    /** @todo Test if content plugins modify the product description */
			    echo $this->product->product_teh;
			    ?>
		        </div>
			<?php
		    } // Product Short Description END
		    ?>
		</div>
		<div id="tabs-3">









<p><img src="/images/dost1.jpg" border="0" width="260" height="250" style="float: left; margin-right: 10px;">Доставка товара осуществляется в день заказа, или на следующий день (это зависит от времени поступления заказа) после подтверждения заказа, или в любой другой день, назначенный Вами (за исключением выходных). Точное время доставки уточняется с менеджером при оформлении заказа.</p>
<p><strong>Доставка по Киеву и киевской области</strong><br> Доставка производится в рабочие дни с 10.00 до 21.00 часов (исключая субботу и воскресенья).</p>
<p>Товар доставляется в согласованное заранее время по указанному Вами адресу до парадного квартиры или офиса. При наличии лифта занос товара выполняется бесплатно (если вес оборудования не превышает 25кг.). При отсутствии лифта стоимость подъема товара определяется на месте в зависимости от габаритов, массы и сложности подъема (20-50 грн/этаж).</p>
<p>В пределах Киева бесплатная доставка осуществляется при оформлении заказа на сумму от 1500 грн. Стоимость доставки заказов до 1500 грн составляет 35 грн.</p>
<p>Наши сотрудники оперативно доставят заказ по указанному вами адресу в удобное для вас время. При доставке они продемонстрируют целостность, комплектность и работоспособность товара (для устройств, работающих автономно), а также оформят все необходимые документы и гарантию на товар. Из соображений безопасности проверка товара и товарно-денежный обмен производятся в автомобиле нашего курьера.</p>
<p>Стоимость доставки в пригород Киева 8 грн./км от КПП ГАИ (в одну сторону).</p>
<p>Оплата товара производится заказчиком по факту получения товара.</p>
<p><strong>Доставка по Украине</strong><br> Мы также осуществляем доставку в любой город Украины при помощи коммерческих курьерских служб на условиях 100%-й предоплаты (стоимость перевозки оплачиваются покупателем).</p>
<p><strong>Рекомендуемые нами службы доставки:</strong><br> Новая Почта<br> Интайм<br> Деливери</p>
<p><strong>Так же мы можем переслать товар другими перевозчиками:</strong><br> Гюнсел<br> Автолюкс<br> Ночной Экспресс<br> САТ</p>
<p><strong><img src="/images/dost2.gif" border="0" alt="" style="float: right;">Оплата товара наличными</strong><br> Оплата товара осуществляется наличными,&nbsp; сотруднику службы доставки по факту&nbsp; по адресу, указанному при оформлении заказа.</p>
<p>Вместе с товаром покупателю предоставляются следующие документы:<br> - гарантийный талон.<br> - товарный чек;<br> - инструкция по эксплуатации;</p>
<p>Оплата по безналичному расчету<br> Также можно оплатить банковским переводом через отделение Сбербанка или других банков, обслуживающих физических лиц. Счет на оплату высылается по электронной почте или факсу. При безналичном расчете производится 100% предоплата на расчетный счет магазина. Для получения счета-фактуры свяжитесь с нашими менеджерами.&nbsp; Все счета действительны к оплате в течение 3-х банковских дней. В случае нарушения сроков оплаты, не гарантируется сохранение цены и наличие товара на складе.</p>
<p>Покупателю предоставляются следующие документы:<br> - гарантийный талон.<br> - инструкция по эксплуатации;<br> - оригинал счета;<br> - накладная;</p>


		</div>




    <?php
    if (!empty($this->product->customfieldsSorted['normal'])) {
	$this->position = 'normal';
	echo $this->loadTemplate('customfields');
    } // Product custom_fields END
    // Product Packaging
    $product_packaging = '';
    if ($this->product->product_box) {
	?>
        <div class="product-box">
	    <?php
	        echo JText::_('COM_VIRTUEMART_PRODUCT_UNITS_IN_BOX') .$this->product->product_box;
	    ?>
        </div>
    <?php } // Product Packaging END
    ?>

    <?php
    // Product Files
    // foreach ($this->product->images as $fkey => $file) {
    // Todo add downloadable files again
    // if( $file->filesize > 0.5) $filesize_display = ' ('. number_format($file->filesize, 2,',','.')." MB)";
    // else $filesize_display = ' ('. number_format($file->filesize*1024, 2,',','.')." KB)";

    /* Show pdf in a new Window, other file types will be offered as download */
    // $target = stristr($file->file_mimetype, "pdf") ? "_blank" : "_self";
    // $link = JRoute::_('index.php?view=productdetails&task=getfile&virtuemart_media_id='.$file->virtuemart_media_id.'&virtuemart_product_id='.$this->product->virtuemart_product_id);
    // echo JHTMl::_('link', $link, $file->file_title.$filesize_display, array('target' => $target));
    // }
    if (!empty($this->product->customfieldsRelatedProducts)) {
	echo $this->loadTemplate('relatedproducts');
    } // Product customfieldsRelatedProducts END

    if (!empty($this->product->customfieldsRelatedCategories)) {
	echo $this->loadTemplate('relatedcategories');
    } // Product customfieldsRelatedCategories END
    // Show child categories
    if (VmConfig::get('showCategory', 1)) {
	echo $this->loadTemplate('showcategory');
    }
    if (!empty($this->product->customfieldsSorted['onbot'])) {
    	$this->position='onbot';
    	echo $this->loadTemplate('customfields');
    } // Product Custom ontop end
    ?>

<?php // onContentAfterDisplay event
echo $this->product->event->afterDisplayContent; ?>

<?php
echo $this->loadTemplate('reviews');
?>
</div>
Для заказа или консультации звоните по номеру (044) 383 56 00
