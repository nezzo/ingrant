<?php

defined('_JEXEC') or die;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
    <jdoc:include type="head" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/style.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/media.css" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"  type="text/javascript"></script>
    <script src="/media/system/js/hamburger.js" type="text/javascript"></script>
    <script src="/media/system/js/pushy.js" type="text/javascript"></script>
    <script  src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/hamburger_oborudovanie.js" type="text/javascript"></script>
    <script  src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/hamburger_uslugi.js" type="text/javascript"></script>
    
    
    <?php
      $lang =& JFactory::getLanguage();
      $yaz = $lang->getTag();
    if($_REQUEST['virtuemart_category_id'] == ""){  ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
      <?php } ?>
  <script type="text/javascript">
  jQuery(document).ready(function($){

      $(".lang-inline li.lang-active + li a").attr('href','#');
      $(".lang-inline li.lang-active + li + li a").attr('href','#');

      $acth = $(".menu-right > li.active").height();
      //alert($acth);
      $('.menu-right').css('padding-top',$acth+'px');

  });
  </script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-43355033-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();


  jQuery(function(){
  var e = jQuery(".scrollTop");
  var  speed = 500;

  e.click(function(){
    jQuery("html:not(:animated)" +( !jQuery.browser.opera ? ",body:not(:animated)" : "")).animate({ scrollTop: 0}, 500 );
    return false; //важно!
  });
  //появление
  function show_scrollTop(){
    ( jQuery(window).scrollTop()>300 ) ? e.fadeIn(600) : e.hide();
  }
  jQuery(window).scroll( function(){show_scrollTop()} ); show_scrollTop();

});

</script>


  </head>

  <body>
<?php

if($_REQUEST['ptid'] == 1) { ?>


<style>
    #chpNav183, #chpNav185, #chpNav186, #chpNav192 {
        display:none;
    }
</style>

<?php }

if($_REQUEST['ptid'] == 2) { ?>


    <style>
        #chpNav151, #chpNav185, #chpNav186, #chpNav192 {
            display:none;
        }
    </style>

<?php }
if($_REQUEST['ptid'] == 3) { ?>


    <style>
        #chpNav151, #chpNav183, #chpNav186, #chpNav192 {
            display:none;
        }
    </style>

<?php }
if($_REQUEST['ptid'] == 4) { ?>


    <style>
        #chpNav151, #chpNav185, #chpNav183, #chpNav192 {
            display:none;
        }
    </style>

<?php }

if($_REQUEST['ptid'] == 5) { ?>


    <style>
        #chpNav151, #chpNav185, #chpNav183, #chpNav186 {
            display:none;
        }
    </style>

<?php }
 $id  = JRequest::getInt('Itemid');
if($id==577 || $id==578 || $id==579 || $id==580 || $id==581 || $id==582 || $id==583 || $id==737 || $id==743
|| $id==561 || $id==796 || $id==797 || $id==812 || $id==813 || $id==814 || $id==932 || $id==935 || $id==936 || $id==937 || $id==965 || $id==966
) {?>
<style>
  .menubrend > li {
    display:none;
  }

  .menubrend {
    padding:0px;
    margin:0px;
    background:none;
    border:none;
  }

</style>
<?}
?>

<?php
if($id==534 || $id==835 || $id==836 || $id==837 || $id==838 || $id==839 || $id==840 || $id==926 || $id==947 || $id==948 || $id==841 || $id==842
|| $id==875 || $id==880 || $id==927 || $id==845 || $id==846 || $id==847 || $id==876 || $id==877 || $id==881 || $id==843 || $id==844 || $id==938
|| $id==850 || $id==848 || $id==849 || $id==859 || $id==860 || $id==861 || $id==863 || $id==865 || $id==878 || $id==953 || $id==862 || $id==864
|| $id==866 || $id==879 || $id==943 || $id==871 || $id==873 || $id==872 || $id==874 || $id==867 || $id==869 || $id==868 || $id==870 || $id==954
|| $id==955 || $id==957
) {?>
<style>

.item-534 {
  height:auto!important;
  border:none!important;
}

.item-534 > span > ul {
  display:block!important;
}

.item-534 ul span {
  color: #A3A2A2!important;
}

.item-534.active > span > a {
  background-color: #F4F4F4 !important;
    display: block;
    height: 50px;
    padding-left: 5px !important;
    padding-right: 5px !important;
    padding-top: 5px;
}

.item-534 ul li:hover span, .item-534 ul li.active span {
  color: #000!important;
}

.item-534 ul > li ul {
  display:none;
}

.kontentik #chpNav192 + script + ul {
  display:none!important;
}
</style>
<?}
?>

<?php
if($id==529 || $id==889 || $id==890 || $id==891 || $id==892 || $id==893) {?>
<style>

.item-529 {
  height:auto!important;
  border:none!important;
}

.item-529 > span > ul {
  display:block!important;
}

.item-529 ul span {
  color: #A3A2A2!important;
}

.item-529.active > span > a {
  background-color: #F4F4F4 !important;
    display: block;
    height: 50px;
    padding-left: 5px !important;
    padding-right: 5px !important;
    padding-top: 5px;
}

.item-529 ul li:hover span, .item-529 ul li.active span {
  color: #000!important;
}

.item-529 ul > li ul {
  display:none;
}

.item-529 img {
    float: left;
    margin-top: 15px;
}

.kontentik #system-message-container + ul {
  display:none!important;
}

</style>
<?}
?>

<?php
if($id==513) {?>
<style>
.menubrend > li ul {
  top: 255px !important;
  width: 270px;
  z-index: 9999;
}

  .menubrend {
    padding:0px;
    margin:0px;
    background:none;
    border:none;
  }

.menubrend > li {
  height: 255px !important;
}

.menubrend > li a {
  border:none!important;
}

.menubrend  > li img {
   display:block;
   margin:0px;
   position: relative;
}

</style>
<?}
?>

<?php
if($id==573 || $id==574 || $id==575 || $id==576 || $id==584 || $id==964) {?>
<style>
.menubrend > li ul {
  top: 75px!important;
  width: 410px;
  z-index: 9999;
}

.menubrend > li {
  height: 75px !important;
}

.menubrend > li a {
  border:none!important;
}

.menubrend > li a > span span {
  display: block;
    float: left;
    margin-top: 20px;
    border-right: 1px solid #000000;
    padding-right: 5px;
    margin-left: 10px;
}

.menubrend  > li img {
   display:block;
   margin:0px;
   position: relative;
   width: 65px;
   float:left;
}
</style>
<?}
?>

<?php
if($id==964) {?>
<style>

.menubrend .item-964 {
  left: 0px;
    position: absolute;
    top: 120px;
}

.menubrend .item-964 > span > a > span > span {
  display:none;
}

.menubrend .item-964 a span img {
  display:none;
}

.kontentik h1 {
  background-image:url('/images/kompresor.jpg');
  background-repeat:no-repeat;
  background-position:center top;
  padding-top: 210px;
  margin-bottom: 70px!important;
}

.menubrend .item-964 ul {
  display:block;
  top: 304px !important;
  padding-left: 10px;
  padding-right: 5px;
  background-color:#f9f7f7;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  behavior: url(pie/PIE.htc);
  z-index:10;
  border: 1px solid #ccc;
  margin-top:15px;
  margin-bottom:15px;
}

.menubrend .item-964 ul > li {
  float:left;
  position:relative;
}

.menubrend .item-964 ul > li:hover img {
  display:block!important;
  position:absolute;
  width:auto!important;
  top: -30px !important;
}

.menubrend .item-964 ul > li a > span > span {
  /*border-right: 1px solid #000000;
  padding-left: 10px;
    padding-right: 10px;*/
    margin-top:5px!important;
}

.browse-view h1 + div {
  background-image: url("<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/h1-bg.png");
  background-position: left top;
    background-repeat: no-repeat;
    padding-top: 30px;
}

</style>
<?}
?>

<?php
if($id==576) {?>
<style>

.menubrend .item-576 {
  left: 0px;
    position: absolute;
    top: 120px;
}

.menubrend .item-576 > span > a > span > span {
  display:none;
}

.menubrend .item-576 a span img {
  display:none;
}

.kontentik h1 {
  background-image:url('/images/new_kond4.jpg');
  background-repeat:no-repeat;
  background-position:center top;
  padding-top: 210px;
  margin-bottom: 70px!important;
}

.menubrend .item-576 ul {
  display:block;
  top: 304px !important;
  padding-left: 10px;
  padding-right: 5px;
  background-color:#f9f7f7;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  behavior: url(pie/PIE.htc);
  z-index:10;
  border: 1px solid #ccc;
  margin-top:15px;
  margin-bottom:15px;
}

.menubrend .item-576 ul > li {
  float:left;
  position:relative;
}

.menubrend .item-576 ul > li:hover img {
  display:block!important;
  position:absolute;
  width:auto!important;
  top: -30px !important;
}

.menubrend .item-576 ul > li a > span > span {
  /*border-right: 1px solid #000000;
  padding-left: 10px;
    padding-right: 10px;*/
    margin-top:5px!important;
}

.browse-view h1 + div {
  background-image: url("<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/h1-bg.png");
  background-position: left top;
    background-repeat: no-repeat;
    padding-top: 30px;
}

</style>
<?}
?>

<?php
if($id==584) {?>
<style>

.menubrend .item-584 {
  left: 0px;
    position: absolute;
    top: 120px;
}

.menubrend .item-584 > span > a > span > span {
  display:none;
}

.menubrend .item-584 a span img {
  display:none;
}

.kontentik h1 {
  background-image:url('/images/new_kond5.jpg');
  background-repeat:no-repeat;
  background-position:center top;
  padding-top: 210px;
  margin-bottom: 70px!important;
}

.menubrend .item-584 ul {
  display:block;
  top: 304px !important;
  padding-left: 10px;
  padding-right: 5px;
  background-color:#f9f7f7;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  behavior: url(pie/PIE.htc);
  z-index:10;
  border: 1px solid #ccc;
  margin-top:15px;
  margin-bottom:15px;
}

.menubrend .item-584 ul > li {
  float:left;
  position:relative;
}

.menubrend .item-584 ul > li:hover img {
  display:block!important;
  position:absolute;
  width:auto!important;
  top: -30px !important;
}

.menubrend .item-584 ul > li a > span > span {
  /*border-right: 1px solid #000000;
  padding-left: 10px;
    padding-right: 10px;*/
    margin-top:5px!important;
}

.browse-view h1 + div {
  background-image: url("<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/h1-bg.png");
  background-position: left top;
    background-repeat: no-repeat;
    padding-top: 30px;
}

</style>
<?}
?>

<?php
if($id==574) {?>
<style>

.menubrend .item-574 {
  left: 0px;
    position: absolute;
    top: 120px;
}

.menubrend .item-574 a span span {
  display:none;
}

.menubrend .item-574 a span img {
  display:none;
}

.kontentik h1 {
  background-image:url('/images/new_kond2.jpg');
  background-repeat:no-repeat;
  background-position:center top;
  padding-top: 210px;
}

.menubrend .item-574 ul {
  display:block;
  background:none;
}

.menubrend .item-574 ul > li {
  float:left;
}

.menubrend .item-574 ul > li a > span {
  border-right: 1px solid #000000;
  padding-left: 10px;
    padding-right: 10px;
}

.browse-view h1 + div {
  background-image: url("<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/h1-bg.png");
  background-position: left top;
    background-repeat: no-repeat;
    padding-top: 30px;
}

</style>
<?}
?>

<?php
if($id==573) {?>
<style>

.menubrend .item-573 {
  left: 0px;
    position: absolute;
    top: 120px;
}

.menubrend .item-573 a span span {
  display:none;
}

.menubrend .item-573 a span img {
  display:none;
}

.kontentik h1 {
  background-image:url('/images/new_kond1.jpg');
  background-repeat:no-repeat;
  background-position:center top;
  padding-top: 210px;
}

.menubrend .item-573 ul {
  display:block;
  background:none;
}

.menubrend .item-573 ul > li {
  float:left;
}

.menubrend .item-573 ul > li a > span {
  border-right: 1px solid #000000;
  padding-left: 10px;
    padding-right: 10px;
}

.browse-view h1 + div {
  background-image: url("<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/h1-bg.png");
  background-position: left top;
    background-repeat: no-repeat;
    padding-top: 30px;
}

</style>
<?}
?>

<?php
if($id==575) {?>
<style>

.menubrend .item-575 {
  left: 0px;
    position: absolute;
    top: 120px;
}

.menubrend .item-575 a span span {
  display:none;
}

.menubrend .item-575 a span img {
  display:none;
}

.kontentik h1 {
  background-image:url('/images/new_kond3.jpg');
  background-repeat:no-repeat;
  background-position:center top;
  padding-top: 210px;
}

.menubrend .item-575 ul {
  display:block;
  background:none;
}

.menubrend .item-575 ul > li {
  float:left;
}

.menubrend .item-575 ul > li a > span {
  border-right: 1px solid #000000;
  padding-left: 10px;
    padding-right: 10px;
}

.browse-view h1 + div {
  background-image: url("<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/h1-bg.png");
  background-position: left top;
    background-repeat: no-repeat;
    padding-top: 30px;
}

</style>
<?}
?>
    <!--<table width="100%" cellspacing="0" cellpadding="0" border="0" class="verh-table">
      <tr>
        <td class="verh-table-left" valign="top">&nbsp;</td>
        <td class="verh-table-right" valign="top"><img src="<?php /*echo $this->baseurl */?>/templates/<?php /*echo $this->template; */?>/images/right-kart.png"></td>
      </tr>-->
    </table>

    <div class="header">
          <div class="logo">
            <a href="/">

            <?php
                 if ($yaz=="en-GB")
                {?>
                  <img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/logo_eng.png" />
               <?php
               }
        ?>

        <?php
                 if ($yaz=="uk-UA")
                {?>
                  <img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/logo_ukr.png" />
               <?php
               }
        ?>

        <?php
                 if ($yaz=="ru-RU")
                {?>
                  <img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/logo.png" />
               <?php
               }
        ?>

            </a>
          </div>

          <div class="pereckluch">
              <jdoc:include type="modules" name="position-5" />
          </div>

          <div class="trybka">
           <p><span>(044) 383 56 00</span><br/>
         (067) 247 72 02<br/>
       (095) 649 62 92
       </p>
        <span style="font-size: 14px;text-align: right;display: block;padding-right: 50px;">info@ingrant.com.ua</span>
          </div>
      <jdoc:include type="modules" name="position-18" style="poisk" />

    </div>

    <div class="telo">
         <div class="top-menu">
         
         <div class="head_button">
          <p>Меню</p>
          <button class="hamburger">&#9776;</button>
	  <button class="cross">&#215;</button>
	  </div>
          
          <div class="head_button_uslugi">
          <p>Услуги компании</p>
          <button class="hamburger_uslugi">&#9776;</button>
	  <button class="cross_uslugi">&#215;</button>
	  </div>
          
         <div class="head_button_oborudovanie">
          <p>Оборудование</p>
          <button class="hamburger_oborudovanie">&#9776;</button>
	  <button class="cross_oborudovanie">&#215;</button>
          </div>
          
          
          </div>
          
           <jdoc:include type="modules" name="position-12" />
          <div class="clear"></div>
         </div>
         

         <div class="slider-shop-site">
           <jdoc:include type="modules" name="position-13" />
         </div>

         <?php
                if($_REQUEST['virtuemart_category_id'] != ""){  ?>
                 <table class="kont-table" width="100%" cellspacing="0" cellpadding="0" border="0">
          <tr>
            <td valign="top" class="ochen-left-td">
              <jdoc:include type="modules" name="position-14" style="rightmenu"/>
            <br /><jdoc:include type="modules" name="servises" style="servisesleft" />
            </td>

            <td valign="top" class="left-td">
              <div class="kontentik">
                 <jdoc:include type="message" />
              <?php if($_REQUEST['view']=="category"){ ?>
              <jdoc:include type="modules" name="filtr" />

              <?php } ?>
              <div class="clear"></div>
              <jdoc:include type="component" />
               </div>
            </td>

            <td valign="top" class="right-td">




                      <div class="spec-predlog">
                        <jdoc:include type="modules" name="position-15" style="spectit" />
                        <?php
                       if ($yaz=="en-GB")
                      {?>
                        <a href="index.php?option=com_content&view=category&layout=blog&id=25&Itemid=455" class="all-spec">All offers</a>
                     <?php
                     }
              ?>

              <?php
                       if ($yaz=="uk-UA")
                      {?>
                        <a href="index.php?option=com_content&view=category&layout=blog&id=26&Itemid=455" class="all-spec">Всі пропозиції</a>
                     <?php
                     }
              ?>

              <?php
                       if ($yaz=="ru-RU")
                      {?>
                        <a href="index.php?option=com_content&view=category&layout=blog&id=20&Itemid=186" class="all-spec">Все предложения</a>
                     <?php
                     }
              ?>

                      </div>
            </td>
          </tr>
         </table>


        <?php }
        else {
        ?>

        <table class="kont-table" width="100%" cellspacing="0" cellpadding="0" border="0">
          <tr>
            <td valign="top" class="ochen-left-td">
              <div class="right-menu">
                        <jdoc:include type="modules" name="position-14" style="rightmenu" />
                      </div>

                      <div class="spec-predlog">
                        <jdoc:include type="modules" name="position-15" style="spectit" />
                        <?php
                       if ($yaz=="en-GB")
                      {?>
                        <a href="index.php?option=com_content&view=category&layout=blog&id=25&Itemid=455" class="all-spec">All offers</a>
                     <?php
                     }
              ?>

              <?php
                       if ($yaz=="uk-UA")
                      {?>
                        <a href="index.php?option=com_content&view=category&layout=blog&id=26&Itemid=455" class="all-spec">Всі пропозиції</a>
                     <?php
                     }
              ?>

              <?php
                       if ($yaz=="ru-RU")
                      {?>
                        <a href="index.php?option=com_content&view=category&layout=blog&id=20&Itemid=186" class="all-spec">Все предложения</a>
                     <?php
                     }
              ?>

                      </div>
            </td>

            <td valign="top" class="left-td">
              <div class="kontentik">
                 <jdoc:include type="message" />
              <jdoc:include type="component" />

               </div>
            </td>

            <td valign="top" class="right-td">
              <jdoc:include type="modules" name="servises"  style="ser"/>
            </td>
          </tr>
         </table>
         <?php }  ?>


    </div>

    <div class="footer">
      <a class="scrollTop" style="display: block;" href="#"></a>
          <div class="bottom-menu">
            <jdoc:include type="modules" name="position-16" />
            <div class="clear"></div>
          </div>

          <div class="copyright">
            Компания "Ингрант - Партнер", тел. 044 383 56 00, 044 285 30 35, 067 247 72 02, 066 624 01 24. Адрес: г.Киев, ул. Щорса, 31, 3 эт. оф. 29
          </div>
    </div>
<script type="text/javascript">
 /* <![CDATA[ */
 var google_conversion_id = 981320996;
 var google_custom_params = window.google_tag_params;
 var google_remarketing_only = true;
 /* ]]> */
 </script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/981320996/?value=0&guid=ON&script=0"/>
</div>
</noscript>
    <!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter37390675 = new Ya.Metrika({
                    id:37390675,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true,
                    trackHash:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<!-- /Yandex.Metrika counter -->
<!-- Start FastcallAgent code -->
<script type="text/javascript">
var fca_code = '17cd1fc88d10085de3bebfa84b857c05';
(function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true; po.charset = 'utf-8';
    po.src = '//ua.cdn.fastcallagent.com/tracker.min.js?_='+Date.now();
    var s = document.getElementsByTagName('script')[0];
    if (s) { s.parentNode.insertBefore(po, s); }
    else { s = document.getElementsByTagName('head')[0]; s.appendChild(po); }
})();
</script>
<!-- End FastcallAgent code -->
  </body>
</html>
