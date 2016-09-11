<?php
/**
 *
 * Show the product details page
 *
 * @package    VirtueMart
 * @subpackage
 * @author Max Milbers, Valerie Isaksen
 * @todo handle child products
 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2004 - 2010 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * @version $Id: default_addtocart.php 6433 2012-09-12 15:08:50Z openglobal $
 */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
if (isset($this->product->step_order_level))
	$step=$this->product->step_order_level;
else
	$step=1;
if($step==0)
	$step=1;
$alert=JText::sprintf ('COM_VIRTUEMART_WRONG_AMOUNT_ADDED', $step);
?>
<?php
	$lang =& JFactory::getLanguage();
	$yaz = $lang->getTag();
?>
<div class="addtocart-area">

<?php
  	if ($yaz=="en-GB")
 	{?>

 			   <div href="#" onclick="jQuery('#divwin_buy').css({'top':'150px', 'left':'30%'}); wObj=document.getElementById('divwin_buy'); wObj.style.opacity=1; wObj.style.display='block'; op=0; appear();" class="buy">Order</div>
		<div class="divwin" id="divwin_buy">
			<div class="closeButton" onclick="wObj.style.display='none';"><img src="images/fancy_close.png" /></div>

				<div class="rsform">
					<form method="post" id="userForm" action="" onsubmit="return myValidation_buy()">
						<div class="componentheading">Your order</div>

							<table border="0">
								<tbody>
								<tr class="rsform-block rsform-block-name">
									<td>Enter your name:</td>
									<td><input type="text" value="" size="20" name="name_buy" id="name_buy" class="rsform-input-box"><div class="formClr"></div></td>
									<td></td>
								</tr>
								<tr class="rsform-block rsform-block-telefon">
									<td>Your phone number *:</td>
									<td><input type="text" value="" size="20" name="telefon_buy" id="telefon_buy" class="rsform-input-box"><div class="formClr"></div><span id="component24" class="erro">Введите номер телефона</span></td>
									<td></td>
								</tr>
								<tr class="rsform-block rsform-block-telefon">
									<td>Your email:</td>
									<td><input type="text" value="" size="20" name="email" id="email" class="rsform-input-box"><div class="formClr"></div></td>
									<td></td>
								</tr>
								<tr class="rsform-block rsform-block-telefon">
									<td>Wishes:</td>
									<td><input type="text" value="" size="20" name="wish" id="wish" class="rsform-input-box"><div class="formClr"></div></td>
									<td></td>
								</tr>
								<tr class="rsform-block rsform-block-otpravit">
									<td></td>
									<td><input type="submit" value="Send" name="otpravit_buy" id="otpravit_buy" class="rsform-submit-button"><div class="formClr"></div></td>
									<td></td>
								</tr>
							</tbody>
							</table>
					<input type="hidden" name="prod_name_buy" value="<?=$this->product->product_name?>">
				</form>
				</div>
		</div>



<?php
if( isset($_POST['otpravit_buy']) ) {
				$db =& JFactory::getDBO();
                $sql = "SELECT email FROM #__users WHERE id = 42";
                $res = $db->setQuery($sql)->loadObjectList();
				$mailer = JFactory::getMailer();
				$config = JFactory::getConfig();
				$sender = array($config->getValue('config.mailfrom'), $config->getValue('config.fromname') );
				$mailer->setSender($sender);
				$subject = 'Заказ товару';
				$mailer->setSubject($subject);

				//$recipient[] = 'alfressko@gmail.com';	// Почтовый ящик администратора
				$recipient[] = $res[0]->email;
				//die($res[0]->email);
				$mailer->addRecipient($recipient);


				$body = "<table border='1' cellspacing='10' cellpadding='10'>
							<tr>
								<td colspan='2'>Your order</td>
							</tr>
							<tr>
								<td>I want to buy</td>
								<td><a href='".substr(JURI::base(), 0, strlen(JURI::base())-1)."".$this->product->link."'>".$this->product->product_name."</a></td>
							</tr>
							<tr>
								<td>Name</td>
								<td>".$_POST['name_buy']."</td>
							</tr>
							<tr>
								<td>Phone</td>
								<td>".$_POST['telefon_buy']."</td>
							</tr>
							<tr>
								<td>Mail</td>
								<td>".$_POST['email']."</td>
							</tr>
							<tr>
								<td>Wishes</td>
								<td>".$_POST['wish']."</td>
							</tr>

						</table>";


				$mailer->isHTML(true);
				$mailer->setBody($body);

				$send = $mailer->Send();

				if ($send !== true) {
					echo 'Error sending email: '.$send->get('message');
				}
                 else {

					echo '<script>alert("Thank you, your order is accepted");</script>';
                  }
}?>
  <?php
  }
?>

<?php
  	if ($yaz=="uk-UA")
 	{?>
 			   <div href="#" onclick="jQuery('#divwin_buy').css({'top':'150px', 'left':'30%'}); wObj=document.getElementById('divwin_buy'); wObj.style.opacity=1; wObj.style.display='block'; op=0; appear();" class="buy">Замовити</div>
		<div class="divwin" id="divwin_buy">
			<div class="closeButton" onclick="wObj.style.display='none';"><img src="images/fancy_close.png" /></div>

				<div class="rsform">
					<form method="post" id="userForm" action="" onsubmit="return myValidation_buy()">
						<div class="componentheading">Замовлення товару</div>

							<table border="0">
								<tbody>
								<tr class="rsform-block rsform-block-name">
									<td>Введіть Ваше ім'я:</td>
									<td><input type="text" value="" size="20" name="name_buy" id="name_buy" class="rsform-input-box"><div class="formClr"></div></td>
									<td></td>
								</tr>
								<tr class="rsform-block rsform-block-telefon">
									<td>Ваш телефон *:</td>
									<td><input type="text" value="" size="20" name="telefon_buy" id="telefon_buy" class="rsform-input-box"><div class="formClr"></div><span id="component24" class="erro">Введите номер телефона</span></td>
									<td></td>
								</tr>
								<tr class="rsform-block rsform-block-telefon">
									<td>Ваш email:</td>
									<td><input type="text" value="" size="20" name="email" id="email" class="rsform-input-box"><div class="formClr"></div></td>
									<td></td>
								</tr>
								<tr class="rsform-block rsform-block-telefon">
									<td>Побажання:</td>
									<td><input type="text" value="" size="20" name="wish" id="wish" class="rsform-input-box"><div class="formClr"></div></td>
									<td></td>
								</tr>
								<tr class="rsform-block rsform-block-otpravit">
									<td></td>
									<td><input type="submit" value="Надіслати" name="otpravit_buy" id="otpravit_buy" class="rsform-submit-button"><div class="formClr"></div></td>
									<td></td>
								</tr>
							</tbody>
							</table>
					<input type="hidden" name="prod_name_buy" value="<?=$this->product->product_name?>">
				</form>
				</div>
		</div>



<?php
if( isset($_POST['otpravit_buy']) ) {
				$db =& JFactory::getDBO();
                $sql = "SELECT email FROM #__users WHERE id = 42";
                $res = $db->setQuery($sql)->loadObjectList();
				$mailer = JFactory::getMailer();
				$config = JFactory::getConfig();
				$sender = array($config->getValue('config.mailfrom'), $config->getValue('config.fromname') );
				$mailer->setSender($sender);
				$subject = 'Заказ товару';
				$mailer->setSubject($subject);

				//$recipient[] = 'alfressko@gmail.com';	// Почтовый ящик администратора
				$recipient[] = $res[0]->email;
				//die($res[0]->email);
				$mailer->addRecipient($recipient);


				$body = "<table border='1' cellspacing='10' cellpadding='10'>
							<tr>
								<td colspan='2'>Замовлення товару</td>
							</tr>
							<tr>
								<td>Я хочу придбати</td>
								<td><a href='".substr(JURI::base(), 0, strlen(JURI::base())-1)."".$this->product->link."'>".$this->product->product_name."</a></td>
							</tr>
							<tr>
								<td>Ім'я</td>
								<td>".$_POST['name_buy']."</td>
							</tr>
							<tr>
								<td>Телефон</td>
								<td>".$_POST['telefon_buy']."</td>
							</tr>
							<tr>
								<td>Пошта</td>
								<td>".$_POST['email']."</td>
							</tr>
							<tr>
								<td>Побажання</td>
								<td>".$_POST['wish']."</td>
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
}?>
  <?php
  }
?>

<?php
  	if ($yaz=="ru-RU")
 	{?>
 			   <div href="#" onclick="jQuery('#divwin_buy').css({'top':'150px', 'left':'30%'}); wObj=document.getElementById('divwin_buy'); wObj.style.opacity=1; wObj.style.display='block'; op=0; appear();" class="buy">Заказать</div>
		<div class="divwin" id="divwin_buy">
			<div class="closeButton" onclick="wObj.style.display='none';"><img src="images/fancy_close.png" /></div>

				<div class="rsform">
					<form method="post" id="userForm" action="" onsubmit="return myValidation_buy()">
						<div class="componentheading">Заказ товара</div>

							<table border="0">
								<tbody>
								<tr class="rsform-block rsform-block-name">
									<td>Введите Ваше имя:</td>
									<td><input type="text" value="" size="20" name="name_buy" id="name_buy" class="rsform-input-box"><div class="formClr"></div></td>
									<td></td>
								</tr>
								<tr class="rsform-block rsform-block-telefon">
									<td>Ваш телефон *:</td>
									<td><input type="text" value="" size="20" name="telefon_buy" id="telefon_buy" class="rsform-input-box"><div class="formClr"></div><span id="component24" class="erro">Введите номер телефона</span></td>
									<td></td>
								</tr>
								<tr class="rsform-block rsform-block-telefon">
									<td>Ваш email:</td>
									<td><input type="text" value="" size="20" name="email" id="email" class="rsform-input-box"><div class="formClr"></div></td>
									<td></td>
								</tr>
								<tr class="rsform-block rsform-block-telefon">
									<td>Пожелания:</td>
									<td><input type="text" value="" size="20" name="wish" id="wish" class="rsform-input-box"><div class="formClr"></div></td>
									<td></td>
								</tr>
								<?php if($this->product->product_length != "0" ){ ?>
									<tr class="rsform-block rsform-block-koliche">
										<td>Количество:</td>
										<td><input type="text" value="" size="20" name="koliche" id="koliche" class="rsform-input-box"><div class="formClr"></div></td>
										<td></td>
									</tr>
								<?php } ?>
								<tr class="rsform-block rsform-block-otpravit">
									<td></td>
									<td><input type="submit" value="Отправить" name="otpravit_buy" id="otpravit_buy" class="rsform-submit-button"><div class="formClr"></div></td>
									<td></td>
								</tr>
							</tbody>
							</table>
					<input type="hidden" name="prod_name_buy" value="<?=$this->product->product_name?>">
				</form>
				</div>
		</div>





<?php
if( isset($_POST['otpravit_buy']) ) {
				$db =& JFactory::getDBO();
                $sql = "SELECT email FROM #__users WHERE id = 42";
                $res = $db->setQuery($sql)->loadObjectList();
				$mailer = JFactory::getMailer();
				$config = JFactory::getConfig();

					$sender = 'info@ingrant.com.ua';


				$mailer->setSender($sender);
				$subject = 'Заказ товара';
				$mailer->setSubject($subject);


				//$recipient[] = 'alfressko@gmail.com';	// Почтовый ящик администратора
				$recipient[] = 'infoingrant@gmail.com';

				$mailer->addRecipient($recipient);

			$sqlmax = "SELECT MAX(number) as num FROM ilxv3_order_numbers";


    $dol = "SELECT currency_exchange_rate FROM ilxv3_virtuemart_currencies WHERE currency_numeric_code = 840";
    $db->setQuery($dol);
    $dols = $db->loadAssocList();

                $reslast = $db->setQuery($sqlmax)->loadObjectList();
				$fir = (float)$reslast[0]->num;
				$sec = 1;
				$max = $fir + $sec;
				$con = new mysqli("localhost","u_ingrant","dVPKrJWM","ingrant");
				mysqli_query($con,"INSERT INTO ilxv3_order_numbers (number) VALUES (".$max.")");
				$ip = $_SERVER["REMOTE_ADDR"];
				 $id = mysqli_query($con, "SELECT virtuemart_order_id FROM ilxv3_virtuemart_orders ORDER BY created_on DESC ");
	$row = mysqli_fetch_array($id);
	$last = (int)($row[0]) + 1;

				 $items = mysqli_query($con,"INSERT INTO ilxv3_virtuemart_order_items (virtuemart_order_item_id, virtuemart_order_id, virtuemart_vendor_id,
	virtuemart_product_id, order_item_sku, order_item_name, product_quantity, product_item_price, product_tax, product_basePriceWithTax,
	 product_final_price, product_subtotal_discount, product_subtotal_with_tax, order_item_currency, order_status, product_attribute, created_on, created_by, modified_on,
	 modified_by, locked_on, locked_by)
					VALUES ('', '".$max."', 1,
					'".$this->product->virtuemart_product_id."', '".$this->product->product_sku."', '".$this->product->product_name."', 1,
					'".ceil($this->product->product_price*$dols[0]['currency_exchange_rate'])."', '0.00000', '0.00000', '".$this->product->product_price."', '0.00000', '0.00000', null, 'P',
					null, '".date('Y-m-d')." ".date('H:i:s')."', 0, '".date('Y-m-d')." ".date('H:i:s')."', 0, '0000-00-00 00:00:00', 0)");

		$orders = mysqli_query($con,"INSERT INTO ilxv3_virtuemart_orders (`virtuemart_order_id`, `virtuemart_user_id`, `virtuemart_vendor_id`,
		`order_number`, `order_pass`, `order_total`, `order_salesPrice`, `order_billTaxAmount`, `order_billTax`, `order_billDiscountAmount`,
		`order_discountAmount`, `order_subtotal`, `order_tax`, `order_shipment`, `order_shipment_tax`, `order_payment`, `order_payment_tax`,
		`coupon_discount`, `coupon_code`, `order_discount`, `order_currency`, `order_status`, `user_currency_id`, `user_currency_rate`,
		`virtuemart_paymentmethod_id`, `virtuemart_shipmentmethod_id`, `customer_note`, `ip_address`, `created_on`, `created_by`, `modified_on`,
		`modified_by`, `locked_on`, `locked_by`)
		VALUES ('', 0, 1, '".$max."', 'p_000c', '".ceil($this->product->product_price*$dols[0]['currency_exchange_rate'])."', '111', '0.00000', 0, '0.00000', '0.00000', '".ceil($this->product->product_price*$dols[0]['currency_exchange_rate'])."',
				'0.00000', '0.00', '0.00000', '0.00', '0.00000', '0.00', null, '0.00', 199, 'P', 199, '1.00000', 1, 1, '', '".$ip ."',
				'".date('Y-m-d')." ".date('H:i:s')."', 0, '".date('Y-m-d')." ".date('H:i:s')."', 0, '0000-00-00 00:00:00', 0)");

				$userinfos = mysqli_query($con,"INSERT INTO ilxv3_virtuemart_order_userinfos (virtuemart_order_userinfo_id, virtuemart_order_id, virtuemart_user_id,
address_type, address_type_name, company, title, last_name, first_name, middle_name, phone_1, phone_2, fax, address_1, address_2, city,
virtuemart_state_id, virtuemart_country_id, zip, email, agreed, created_on, created_by, modified_on, modified_by, locked_on, locked_by)
				VALUES ('', '".$max."', 0, 'BT', null, null, 'Mr', '".$_POST['name_buy']."', '".$_POST['name_buy']."', null, '".$_POST['telefon_buy']."', null, null, '".$_POST['wish']."', null, '".$_POST['wish']."',
				0, 220, '0000', '".$_POST['email']."', 0, '".date('Y-m-d')." ".date('H:i:s')."', 0, '".date('Y-m-d')." ".date('H:i:s')."', 0, '0000-00-00 00:00:00', 0)");


				mysqli_close($con);
				$body = "<table border='1' cellspacing='10' cellpadding='10'>
							<tr>
								<td colspan='2'>Заказ товара</td>
							</tr>
							<tr>
								<td>Я хочу преобрести</td>
								<td><a href='http://ingrant.com.ua".$this->product->link."'>".$this->product->product_name."</a></td>
							</tr>
							<tr>
								<td>Имя</td>
								<td>".$_POST['name_buy']."</td>
							</tr>
							<tr>
								<td>Телефон</td>
								<td>".$_POST['telefon_buy']."</td>
							</tr>
							<tr>
								<td>Почта</td>
								<td>".$_POST['email']."</td>
							</tr>
							<tr>
								<td>Пожелания</td>
								<td>".$_POST['wish']."</td>
							</tr>
							<tr>
								<td>Количество</td>
								<td>".$_POST['koliche']."</td>
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
}?>
  <?php
  }
?>

	<div class="clear"></div>
</div>
