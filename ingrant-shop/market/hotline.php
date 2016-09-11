<?php

class ExchangeRate {



    public $exchange_url =
            'http://bank-ua.com/export/currrate.xml';
    public $xml;

    function __construct(){

        return $this->xml =
                simplexml_load_file($this->exchange_url);
    }

    function getExchangeRateByChar3($char3){

     if ($this->xml!==FALSE) {


      foreach($this->xml->children() as $item){
           $row = simplexml_load_string($item->asXML());

           $v = $row->xpath('//char3[. ="' . $char3 . '"]');

           if($v[0]){
              $result = $item;
              break;
           }
      }
     }
     return $result;
    }
}

$er = new ExchangeRate();

$data = $er->getExchangeRateByChar3('USD');
$curs = $data->rate / $data->size;


  define('_JEXEC', 1);
  define('DS', DIRECTORY_SEPARATOR);
  define('JPATH_BASE', str_replace('market', '', dirname(__FILE__)));
  require_once(JPATH_BASE.DS.'includes'.DS.'defines.php');
  require_once(JPATH_BASE.DS.'includes'.DS.'framework.php');

  $app = JFactory::getApplication('site');
  $app->initialise();

  require(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_virtuemart'.DS.'helpers'.DS.'config.php');
  VmConfig::loadConfig();
  $confFile = "../configuration.php";
  require_once($confFile);
  $conf = new JConfig();
  $link = mysql_connect($conf->host, $conf->user, $conf->password) or die ("Could not connect to MySQL");
  mysql_select_db ($conf->db) or die ("Could not select database");

  $db = JFactory::getDBO();
  $config = new JConfig();
	//mysql_set_charset('utf-8',$link);
  $query = "SELECT prod.virtuemart_product_id, prod.product_name, prod.short_char, prod.slug, price.product_price, price.product_currency, prod.product_desc, med.file_url, manuf.mf_name, prod_sku.product_sku, prod_sku.product_ordered, cat.category_name, cat.virtuemart_category_id, cat.slug as slugcat
      FROM ilxv3_virtuemart_products_ru_ru AS prod
      LEFT JOIN ilxv3_virtuemart_product_prices AS price ON price.virtuemart_product_id = prod.virtuemart_product_id
      LEFT JOIN ilxv3_virtuemart_product_medias AS prod_img ON prod.virtuemart_product_id = prod_img.virtuemart_product_id
      LEFT JOIN ilxv3_virtuemart_medias AS med ON prod_img.virtuemart_media_id = med.virtuemart_media_id
      LEFT JOIN ilxv3_virtuemart_product_manufacturers AS prod_manuf ON prod.virtuemart_product_id = prod_manuf.virtuemart_product_id
      LEFT JOIN ilxv3_virtuemart_manufacturers_ru_ru AS manuf ON prod_manuf.virtuemart_manufacturer_id = manuf.virtuemart_manufacturer_id
      LEFT JOIN ilxv3_virtuemart_products AS prod_sku ON prod.virtuemart_product_id = prod_sku.virtuemart_product_id
      LEFT JOIN ilxv3_virtuemart_product_categories AS prod_cat ON prod.virtuemart_product_id = prod_cat.virtuemart_product_id
      LEFT JOIN ilxv3_virtuemart_categories_ru_ru AS cat ON prod_cat.virtuemart_category_id = cat.virtuemart_category_id
      GROUP BY prod.virtuemart_product_id
      ORDER BY prod_sku.product_sku
      ";



  $db->setQuery($query);
  $result = $db->loadAssocList();





  $output ='<table border="1" bordercolor="#CFCFCF" style="width:100%;">
   <tr>

    <th>Кaтeгoрия&nbsp;тoвaрa</th>
    <th>Бренд</th>
    <th>Модель</th>
    <th>Описание&nbsp;товара</th>
	<th>Цена&nbsp;USD,&nbsp;розн.</th>
	<th>Цена&nbsp;USD,&nbsp;опт.</th>
	<th>Цена&nbsp;розн.,&nbsp;грн.</th>
	<th>Наличие</th>
    <th>Гарантия</th>
    <th>Ссылка&nbsp;на&nbsp;товар</th>
    <th>Ссылка&nbsp;на&nbsp;изображение</th>
   </tr>';
   foreach ($result as $product) {

 
   
  $output .='<tr>';
  $output .=
   '<td>'.$product['category_name'].'</td>
   <td>'.$product['mf_name'].'</td>
   <td>'.$product['product_name'].'</td>
   <td>'.$product['short_char'].'</td>
   <td></td>
   <td>дог.</td>
   <td>'.(int)$product['product_price'].'</td>
   <td>доставка</td>
   <td>36</td>
   <td>http://ingrant.com.ua/'.$product['slugcat'].'/'.$product['slug'].'-detail.html</td>
   <td>http://ingrant.com.ua/'.$product['file_url'].'</td>';
  $output .='</tr>';

}
$output .='</table>';
print_r($output);

 /*$filename = 'report.xls';



  $h = fopen($filename,"w+");

   $test = fwrite($h, $output);

    fclose($h);*/


//header("Location:http://ingrant.com.ua/market/".$filename);






?>