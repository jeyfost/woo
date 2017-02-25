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

    <title>О нас | Woo Woo Design</title>

    <style>
		#page-preloader {position: fixed; left: 0; top: 0; right: 0; bottom: 0; background: #fff; z-index: 100500;}
		#page-preloader .spinner {width: 32px; height: 32px; position: absolute; left: 50%; top: 50%; background: url('img/spinner.gif') no-repeat 50% 50%; margin: -16px 0 0 -16px;}
	</style>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
    <script type="text/javascript" src="js/about.js"></script>
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
                <div class="menuTopLineSectionActive" id="tlsAbout"></div>
                <div class="menuTopLineSection" id="tlsPrice"></div>
                <div class="menuTopLineSection" id="tlsWorks"></div>
                <div class="menuTopLineSection" id="tlsMain"></div>
            </div>
            <div id="menuPoints">
               <a href="contacts.php"><div class="menuPoint" id="mpContacts" onmouseover="mpHover(1, 'mpContacts')" onmouseout="mpHover(0, 'mpContacts')">Контакты</div></a>
                <a href="about.php"><div class="menuPointActive" id="mpAbout">О нас</div></a>
                <a href="price.php"><div class="menuPoint" id="mpPrice" onmouseover="mpHover(1, 'mpPrice')" onmouseout="mpHover(0, 'mpPrice')">Услуги и цены</div></a>
                <a href="works.php?c=1"><div class="menuPoint" id="mpWorks" onmouseover="mpHover(1, 'mpWorks')" onmouseout="mpHover(0, 'mpWorks')">Порфтолио</div></a>
                <a href="index.php"><div class="menuPoint" id="mpMain" onmouseover="mpHover(1, 'mpMain')" onmouseout="mpHover(0, 'mpMain')" style="margin: 0;">Главная</div></a>
            </div>
        </div>
    </div>
</div>

<div style="clear: both;"></div>

<div id="content">
    <div class="centerContainer" id="mainCenterContainer">
        <div class="halfContainer" id="mainHalf">
            <span class="headerFont">Кто мы?</span>
            <br /><br />
            <?php

            $textResult = $mysqli->query("SELECT * FROM woo_text");
            $text = $textResult->fetch_assoc();

            echo $text['team_text'];

            ?>
        </div>
        <div class="halfContainer">
            <?php

            $photosResult = $mysqli->query("SELECT * FROM woo_about_photos");
            $photos = $photosResult->fetch_assoc();

            echo "
                <div class='personContainer' id='ePerson'>
                    <img src='img/team/".$photos['e_dark']."' />
                    <br />
                    <div style='margin-top: 7px;'>
                        <span class='nameFont'>Евгения</span>
                        <br />
                        <span class='nameFont' style='color: #000; font-size: 16px;'>(руководитель, художник)</span>
                    </div>
                    <div class='workOverlay' id='eOverlay'></div>
                </div>
                <div style='position: relative; float: left; width: 10px; height: 100%; min-height: 300px;'></div>
                <div class='personContainer' id='nPerson'>
                    <img src='img/team/".$photos['n_dark']."' />
                    <br />
                    <div style='margin-top: 7px;'>
                        <span class='nameFont'>Наталия</span>
                        <br />
                        <span class='nameFont' style='color: #000; font-size: 16px;'>(художник, дизайнер интерьеров)</span>
                    </div>
                    <div class='workOverlay' id='nOverlay'></div>
                </div>
            ";

            ?>
        </div>
        <div style="clear: both;"></div>
        <br /><br />
		<div style="width: 100%; text-align: left;">
			<span class="headerFont">Как мы работаем?</span>
			<br /><br /><br />
			<div class="processContainer" style="margin: 0;">
				<img src="img/process/1.png" />
				<br />
				<span class="nameFont">Звонок</span>
				<br /><br />
				<span>В ходе первого разговора мы узнаём задачу и назначаем встречу.</span>
			</div>
			<div class="processContainer">
				<img src="img/process/2.png" />
				<br />
				<span class="nameFont">Встреча</span>
				<br /><br />
				<span>Встречаемся в офисе или на объекте, обсуждаем проект, согласовываем рабочие моменты.</span>
			</div>
			<div class="processContainer">
				<img src="img/process/3.png" />
				<br />
				<span class="nameFont">Договор</span>
				<br /><br />
				<span>Составляем календарный план, считаем стоимость работ, подписываем документы.</span>
			</div>
			<div class="processContainer">
				<img src="img/process/4.png" />
				<br />
				<span class="nameFont">Начало работы</span>
				<br /><br />
				<span>Делаем первые эскизы, обсуждаем. Если требуется, вносим правки, утверждаем.</span>
			</div>
			<div class="processContainer">
				<img src="img/process/5.png" />
				<br />
				<span class="nameFont">Окончание работы</span>
				<br /><br />
				<span>После утверждения эскизов выполняем оставшуюся часть работ, сдаём, подписываем акт выполненных работ.</span>
			</div>
		</div>
    </div>

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