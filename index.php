<?php

include("scripts/connect.php");

?>

<!doctype html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="keywords" content="роспись, дизайн, рисунок, мозаика, декорации, интерьер, детская">
    <meta name="description" content="Команда художников-декораторов и изобретателей Woo Woo Design, в жизни которых главное — улыбка и созидание.">

    <link rel='stylesheet' type='text/css' href='css/style.css'>

    <link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

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
				<br /><br />
				<a href="https://vk.com/woowoodesign" target="_blank" title="Мы в VK"><img src="img/vk.png" /></a>
				<a href="https://facebook.com/woowoodesign/" target="_blank" title="Мы в Facebook"><img src="img/fb.png" /></a>
				<a href="https://www.instagram.com/woowoo.design/" target="_blank" title="Мы в Instagram"><img src="img/ig.png" /></a>
            </div>
            <div class="footerSection" style="width: 34%;">
                <span class="headerFont">Как нас найти?</span>
                <br />
				<span style="font-size: 16px;">(по предварительному звонку)</span>
				<br /><br />
                <?php

                	$contactsResult = $mysqli->query("SELECT * FROM woo_contacts");
                	$contacts = $contactsResult->fetch_assoc();

                	echo iconv('cp1251', 'utf8', $contacts['country']).", г. ".iconv('cp1251', 'utf8', $contacts['city'])."<br />".iconv('cp1251', 'utf8', $contacts['address']);

                ?>
            </div>
            <div class="footerSection">
                <span class="headerFont">Как с нами связаться?</span>
                <br /><br />
                <?php
                	echo "<br />".$contacts['phone1']."<br /><a href='mailto:".$contacts['email']."'>".$contacts['email']."</a>";
                ?>
            </div>
    </div>
</div>

<div style="clear: both;"></div>

</body>

</html>