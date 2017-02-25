<?php

include("scripts/connect.php");

?>

<!doctype html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel='stylesheet' type='text/css' href='css/style.css'>

    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <link href='https://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

    <title>Woo Woo Design</title>

    <style>
		#page-preloader {position: fixed; left: 0; top: 0; right: 0; bottom: 0; background: #fff; z-index: 100500;}
		#page-preloader .spinner {width: 32px; height: 32px; position: absolute; left: 50%; top: 50%; background: url('img/spinner.gif') no-repeat 50% 50%; margin: -16px 0 0 -16px;}
	</style>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="js/footer.js"></script>

    <script type="text/javascript">
        $(window).on('load', function () {
            var $preloader = $('#page-preloader'), $spinner = $preloader.find('.spinner');
            $spinner.delay(500).fadeOut();
            $preloader.delay(850).fadeOut('slow');
        });
    </script>

</head>

<body>

<div id="page-preloader"><span class="spinner"></span></div>

<div id="menu">
    <div id="menuContent">
        <a href="index.php"><div id="logo"></div></a>
        <div id="menuContainer">
            <div id="menuTopLine">
                <div class="menuTopLineSection" id="tlsContacts"></div>
                <div class="menuTopLineSection" id="tlsAbout"></div>
                <div class="menuTopLineSection" id="tlsPrice"></div>
                <div class="menuTopLineSection" id="tlsWorks"></div>
                <div class="menuTopLineSectionActive" id="tlsMain" style="margin: 0;"></div>
            </div>
            <div id="menuPoints">
               <a href="contacts.php"><div class="menuPoint" id="mpContacts" onmouseover="mpHover(1, 'mpContacts')" onmouseout="mpHover(0, 'mpContacts')">Контакты</div></a>
                <a href="about.php"><div class="menuPoint" id="mpAbout" onmouseover="mpHover(1, 'mpAbout')" onmouseout="mpHover(0, 'mpAbout')">О нас</div></a>
                <a href="price.php"><div class="menuPoint" id="mpPrice" onmouseover="mpHover(1, 'mpPrice')" onmouseout="mpHover(0, 'mpPrice')">Услуги и цены</div></a>
                <a href="works.php?c=1"><div class="menuPoint" id="mpWorks" onmouseover="mpHover(1, 'mpWorks')" onmouseout="mpHover(0, 'mpWorks')">Порфтолио</div></a>
                <a href="index.php"><div class="menuPointActive" id="mpMain" style="margin: 0;">Главная</div></a>
            </div>
        </div>
    </div>
</div>

<div style="clear: both;"></div>

<div id="contentMain">
	<br /><br />
	<img src="img/main.jpg" id="mainImg" />
	<div id="slogan" style="display: inline-block; position: absolute; text-align: center; width: 100%; background-color: #fff; opacity: .5; padding-bottom: 15px;">
		<div style="opacity: 1;">
			<span style="color: #000; font-size: 80px; font-family: 'Open Sans Condensed', sans-serif;">Посвящено совершенству</span>
		</div>
	</div>
	<div id="mask"></div>
</div>

<div id="footer">
    <div id="footerContent">
            <div class="footerSection">
                <a href="index.php"><span class="headerFont">WOO WOO DESIGN</span></a>
                <br />
                <span style="font-size: 16px;">Создание сайта и дизайн: <a href="http://airlab.by">airlab</a></span>
				<script type="text/javascript">(function() {
						if (window.pluso) {
							if(typeof window.pluso.start == "function") {
								return;
							}
						}

						if(window.ifpluso == undefined) {
							window.ifpluso = 1;
							var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
							s.type = 'text/javascript';
							s.charset='UTF-8';
							s.async = true;
							s.src = ('https:' == window.location.protocol ? 'https' : 'http') + '://share.pluso.ru/pluso-like.js';
							var h=d[g]('body')[0];
							h.appendChild(s);
						}
					})();
				</script>
				<br /><br />
				<a href="https://vk.com/woowoodesign" target="_blank" title="Мы в VK"><img src="img/vk.png" /></a>
				<a href="https://facebook.com/woowoodesign/" target="_blank" title="Мы в Facebook"><img src="img/fb.png" /></a>
				<a href="https://www.instagram.com/woowoo.design/" target="_blank" title="Мы в Instagram"><img src="img/ig.png" /></a>
            </div>
            <div class="footerSection" style="width: 34%;">
                <span class="headerFont">Как нас найти?</span>
                <br /><br />
                <?php

                $contactsResult = $mysqli->query("SELECT * FROM woo_contacts");
                $contacts = $contactsResult->fetch_assoc();

                echo $contacts['country'].", г. ".$contacts['city']."<br />".$contacts['address'];

                ?>
            </div>
            <div class="footerSection">
                <span class="headerFont">Как с нами связаться?</span>
                <br /><br />
                <?php

                echo $contacts['phone1']."<br />".$contacts['phone2']."<br /><a href='mailto:".$contacts['email']."'>".$contacts['email']."</a>";

                ?>
            </div>
    </div>
</div>

<div style="clear: both;"></div>

</body>

</html>