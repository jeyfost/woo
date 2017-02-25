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

    <title>Прайс-лист | Woo Woo Design</title>

    <style>
		#page-preloader {position: fixed; left: 0; top: 0; right: 0; bottom: 0; background: #fff; z-index: 100500;}
		#page-preloader .spinner {width: 32px; height: 32px; position: absolute; left: 50%; top: 50%; background: url('img/spinner.gif') no-repeat 50% 50%; margin: -16px 0 0 -16px;}
	</style>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
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
                <div class="menuTopLineSectionActive" id="tlsPrice"></div>
                <div class="menuTopLineSection" id="tlsWorks"></div>
                <div class="menuTopLineSection" id="tlsMain"></div>
            </div>
            <div id="menuPoints">
                <a href="contacts.php"><div class="menuPoint" id="mpContacts" onmouseover="mpHover(1, 'mpContacts')" onmouseout="mpHover(0, 'mpContacts')">Контакты</div></a>
                <a href="about.php"><div class="menuPoint" id="mpAbout" onmouseover="mpHover(1, 'mpAbout')" onmouseout="mpHover(0, 'mpAbout')">О нас</div></a>
                <a href="price.php"><div class="menuPointActive" id="mpPrice">Услуги и цены</div></a>
                <a href="works.php?c=1"><div class="menuPoint" id="mpWorks" onmouseover="mpHover(1, 'mpWorks')" onmouseout="mpHover(0, 'mpWorks')">Порфтолио</div></a>
                <a href="index.php"><div class="menuPoint" id="mpMain" onmouseover="mpHover(1, 'mpMain')" onmouseout="mpHover(0, 'mpMain')" style="margin: 0;">Главная</div></a>
            </div>
        </div>
    </div>
</div>

<div id="content">
    <?php

    $priceCategoryResult = $mysqli->query("SELECT * FROM woo_price_categories ORDER BY id");
    while($priceCategory = $priceCategoryResult->fetch_assoc()) {
        echo "
            <div class='container'>
                <div class='priceNameContainer'>
                    <span class='nameFont'>".$priceCategory['category']."</span>
                </div>
        ";

        $priceResult = $mysqli->query("SELECT * FROM woo_price WHERE category = '".$priceCategory['id']."'");
        $count = 0;

        while($price = $priceResult->fetch_assoc()) {
            $unitResult = $mysqli->query("SELECT unit FROM woo_units WHERE id = '".$price['unit']."'");
            $unit = $unitResult->fetch_array(MYSQLI_NUM);

            if($count % 2 == 0) {
                echo "
                    <div class='container'>
                        <div class='priceLeft'>
                            <span class='headerFont'>".$price['service']."</span>
                            <br /><br />
                            <span class='categoryFont'>".$price['description']."</span>
                            <br /><br />
                            <span class='nameFont'>от ".$price['price']." руб/".$unit[0]."</span>
                        </div>
                        <div class='priceRight' style='margin-left: 10px;'>
                            <img src='img/price/".$price['picture']."' />
                        </div>
                    </div>
                    <div style='clear: both;'></div>
                ";
            } else {
                echo "
                    <div class='container'>
                        <div class='priceRight'>
                            <img src='img/price/".$price['picture']."' />
                        </div>
                        <div class='priceLeft' style='margin-left: 10px;'>
                            <span class='headerFont'>".$price['service']."</span>
                            <br /><br />
                            <span class='categoryFont'>".$price['description']."</span>
                            <br /><br />
                            <span class='nameFont'>от ".$price['price']." руб/".$unit[0]."</span>
                        </div>
                    </div>
                    <div style='clear: both;'></div>
                ";
            }

            $count++;

        }

        echo "
            </div>
            <div style='clear: both;'></div>
        ";
    }

    ?>
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