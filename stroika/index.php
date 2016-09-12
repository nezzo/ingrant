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
    <script type="text/javascript">
      function appear() {
        if(op < 1) {
          op += 0.1;
          wObj.style.opacity = op;
          wObj.style.filter='alpha(opacity='+op*100+')';
          t = setTimeout('appear()', 30);
        }
      }

      jQuery(document).ready(function($){
      
		$('.menu-left > li > span > a').removeAttr("href");
      });
  </script>

  <?php
    $lang =& JFactory::getLanguage();
    $yaz = $lang->getTag();
  ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-43355033-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
  </head>

  <body>

      <div class="obolochka">
        <div class="header">
          <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tr>
              <td class="top-left-td" valign="top">
                <div class="logo">
                  <a href="/">
                    <?php
                                      if ($yaz=="en-GB")
                                     {?>
                                       <img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/logo_stroi_en.png" />
                                    <?php
                                    }
                  ?>

                  <?php
                                      if ($yaz=="uk-UA")
                                     {?>
                                       <img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/logo_stroi_ukr.png" />
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


              </td>

              <td class="top-right-td" valign="top">
            <div class="perekluch">
                  <jdoc:include type="modules" name="position-5" />
                </div>
                <div class="telefon-top">
                  <div class="telefon-vnut">
                    <jdoc:include type="modules" name="position-8" />
                  </div>
                  <a href="#" onclick="jQuery('#divwin_call').css({'top':'150px', 'left':'-215%'}); wObj=document.getElementById('divwin_call'); wObj.style.opacity=1; wObj.style.display='block'; op=0; appear();">
                    <?php
                                      if ($yaz=="en-GB")
                                     {?>
                                       Request a call back
                                    <?php
                                    }
                  ?>

                  <?php
                                      if ($yaz=="uk-UA")
                                     {?>
                                       Замовити зворотній дзвінок
                                    <?php
                                    }
                  ?>

                  <?php
                                      if ($yaz=="ru-RU")
                                     {?>
                                       Заказать обратный звонок
                                    <?php
                                    }
                  ?>
                  </a>

                  <div class="divwin" id="divwin_call">
                  <div class="closeButton" onclick="wObj.style.display='none';"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/fancy_close.png" /></div>
                  <jdoc:include type="modules" name="position-19" style="none" />
                </div>
                </div>
              </td>
            </tr>
          </table>

          <div class="top-menu">
          <div class="vertical_button">
          <p>Меню</p>
          <button class="hamburger_vertical">&#9776;</button>
	  <button class="cross_vertical">&#735;</button>
          </div>
          <div class="head_button">
          <p>Меню</p>
          <button class="hamburger">&#9776;</button>
	  <button class="cross">&#735;</button>
	  </div>
            <jdoc:include type="modules" name="position-6" />
            <div class="clear"></div>
          </div>
        </div>

        <div class="telo">
             <table width="100%" cellspacing="0" callpadding="0" border="0">
                 <tr>
                   <td valign="top" class="left-td">

                         <div class="left-menu">
                              <jdoc:include type="modules" name="position-7" />
                         </div>

                         <div class="kartink-vyz">
                           <jdoc:include type="modules" name="position-9" />
                         </div>

                   </td>

                   <td valign="top" class="right-td">
                     <div class="slider-site">
                       <jdoc:include type="modules" name="position-10" />
                     </div>

                     <div class="kontentik">
                       <jdoc:include type="message" />
                <jdoc:include type="component" />
                     </div>
                   </td>
                 </tr>
             </table>
        </div>

        <div class="footer">
        	<div class="footer-in">
				<jdoc:include type="modules" name="position-11" />
			</div>
        </div>

      </div>

		<!-- GoogleTagManager -->
			<noscript><iframesrc="//www.googletagmanager.com/ns.html?id=GTM-WJVJH4"
			height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
			<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-WJVJH4');</script>
		<!-- EndGoogleTagManager -->
		
	
  </body>
</html>
