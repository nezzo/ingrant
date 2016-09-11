<?php

defined('_JEXEC') or die;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
    <jdoc:include type="head" />
  <?php
    //print_r ($_SERVER['REQUEST_URI']) ;
    if($_SERVER['REQUEST_URI'] != "/") {

  ?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js" type="text/javascript"></script>
  <?php
    }
  ?>

    <script type="text/javascript">
    </script>

    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/style.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/media.css" type="text/css" />

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

            <jdoc:include type="modules" name="position-5" />

            <div class="top-menu">
              <jdoc:include type="modules" name="position-0" />
              <div class="clear"></div>
            </div>
          </div>

          <div class="telo">
            <?php
          //print_r ($_SERVER['REQUEST_URI']) ;
          if($_SERVER['REQUEST_URI'] == "/ua/" || $_SERVER['REQUEST_URI'] == "/" || $_SERVER['REQUEST_URI'] == "/en/") {

        ?>
          <div class="obch-str"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/str-prosto.png" /></div>
              <div class="left-blocks">

                  <?php
          if ($yaz=="en-GB")
          {?>
            <div class="dop-tit">(Construction and Maintenance handed)</div>
          <?php
          }
          ?>

          <?php
          if ($yaz=="uk-UA")
          {?>
            <div class="dop-tit">(Будівництво та ремонт будівель)</div>
          <?php
          }
          ?>

          <?php
          if ($yaz=="ru-RU")
          {?>
            <div class="dop-tit">(Строительство и ремонт зданий)</div>
          <?php
          }
          ?>

                    <jdoc:include type="modules" name="position-2" style="topmenu" />
            <!--div class="block_">
              <div class="blocks-tit">Строительное  подразделение</div>
                <ul class="menu-strpodraz">
                  <li><span><a href="/ru/stroiteltvo-domov-i-kotedzhej-iz-kamnya.html"><span>Строительтво</span></a></span></li>
                  <li><span><a href="/ru/stroitelstvo-derevyannykh-domov.html"><span>Ремонтные работы</span></a></span></li>
                  <li><span><a href="/ru/remont-kvartir-i-zhilykh-pomeshchenij.html"><span>Строительные работы</span></a></span></li>
                  <li><span><a href="/ru/dizajn-interera-ob-ektov.html"><span>Благоустройство участка</span></a></span></li>
                  <li><span><a href="/ru/dizajn-interera-ob-ektov.html"><span>Дизайн интерьеров</span></a></span></li>
                </ul>
            </div-->


                    <jdoc:include type="modules" name="position-1" />
                    <a href="/bud.html" class="link_left"></a>
              </div>

              <div class="right-blocks">
                  <?php
          if ($yaz=="en-GB")
          {?>
            <div class="dop-tit">(Selling, engineering solution, installation)</div>
          <?php
          }
          ?>

          <?php
          if ($yaz=="uk-UA")
          {?>
            <div class="dop-tit">(Продаж, інженерне рішення, монтаж)</div>
          <?php
          }
          ?>

          <?php
          if ($yaz=="ru-RU")
          {?>
            <div class="dop-tit">(Продажа, инженерное решение, монтаж)</div>
          <?php
          }
          ?>
                    <jdoc:include type="modules" name="position-4" style="topmenu" />
            <!--div class="block_">
              <div class="blocks-tit">Инженерно - монтажное подразделение</div>
              <ul class="menu-strpodraz">
                <li><span><a href="/ru/konditsionirovanie.html"><span>Кондиционирование</span></a></span></li>
                <li><span><a href="/ru/ventilyatsiya.html"><span>Вентиляция</span></a></span></li>
                <li><span><a href="/ru/otoplenie.html"><span>Отопление</span></a></span></li>
                <li><span><a href="/ru/uvlazhnenie-ochishchenie-i-osushchenie-vozdukha.html"><span>Увлажнение, очищение и осущение воздуха</span></a></span></li>
                <li><span><a href="/ru/montazh-i-servis.html"><span>Монтаж и сервис</span></a></span></li>
              </ul>
            </div-->
                    <jdoc:include type="modules" name="position-3" />
                    <a href="/klimat.html" class="link_right"></a>
              </div>
              <div class="clear"></div>

        <?php
        }
          ?>

            <div class="kontentik">
                  <jdoc:include type="message" />
          <jdoc:include type="component" />
            </div>
          </div>

          <div class="footer">

              <div class="copyright">
        <jdoc:include type="modules" name="copy" />
        </div>

              <div class="brainlab"><a style="font-size: 0px;" href="http://brainlab.com.ua/">разработка студии BRAINLAB</a></div>
          </div>

      </div>
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
