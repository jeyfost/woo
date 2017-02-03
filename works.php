<?php

include("scripts/connect.php");

if(!empty($_REQUEST['id'])) {
    $workResult = $mysqli->query("SELECT * FROM woo_works WHERE id = '".$mysqli->real_escape_string($_REQUEST['id'])."'");
    if($workResult->num_rows == 0) {
        header("Location: works.php?c=1");
    } else {
        $work = $workResult->fetch_assoc();
    }
} else {
    if(!empty($_REQUEST['c'])) {
        $categoriesCountResult = $mysqli->query("SELECT COUNT(id) FROM works_categories WHERE id = '".$mysqli->real_escape_string($_REQUEST['c'])."'");
        $categoriesCount = $categoriesCountResult->fetch_array(MYSQLI_NUM);

        if($categoriesCount[0] == 0) {
            header("Location: works.php?c=1");
        }
    } else {
        header("Location: works.php?c=1");
    }
}

?>

<!doctype html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel='stylesheet' type='text/css' href='css/style.css'>
    <link rel='stylesheet' type='text/css' href='js/shadowbox/shadowbox.css'>

    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <link href='https://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

    <title>Работы | Woo Woo Design</title>

	<style>
		#page-preloader {position: fixed; left: 0; top: 0; right: 0; bottom: 0; background: #fff; z-index: 100500;}
		#page-preloader .spinner {width: 32px; height: 32px; position: absolute; left: 50%; top: 50%; background: url('img/spinner.gif') no-repeat 50% 50%; margin: -16px 0 0 -16px;}
	</style>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="js/shadowbox/shadowbox.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
    <script type="text/javascript" src="js/footer.js"></script>
    <script type="text/javascript" src="js/works.js"></script>

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
                <div class="menuTopLineSectionActive" id="tlsWorks"></div>
                <div class="menuTopLineSection" id="tlsMain"></div>
            </div>
            <div id="menuPoints">
                <a href="contacts.php"><div class="menuPoint" id="mpContacts" onmouseover="mpHover(1, 'mpContacts')" onmouseout="mpHover(0, 'mpContacts')">Контакты</div></a>
                <a href="about.php"><div class="menuPoint" id="mpAbout" onmouseover="mpHover(1, 'mpAbout')" onmouseout="mpHover(0, 'mpAbout')">О нас</div></a>
                <a href="price.php"><div class="menuPoint" id="mpPrice" onmouseover="mpHover(1, 'mpPrice')" onmouseout="mpHover(0, 'mpPrice')">Услуги и цены</div></a>
                <a href="works.php?c=1"><div class="menuPointActive" id="mpWorks">Порфтолио</div></a>
                <a href="index.php"><div class="menuPoint" id="mpMain" onmouseover="mpHover(1, 'mpMain')" onmouseout="mpHover(0, 'mpMain')" style="margin: 0;">Главная</div></a>
            </div>
        </div>
    </div>
</div>

<div id="content" style="text-align: center; width: 100%;">
    <div id="worksMenu">
        <?php
            $c = $mysqli->real_escape_string($_REQUEST['c']);

            if(!empty($_REQUEST['id'])) {
                $workCategoryResult = $mysqli->query("SELECT category FROM woo_works WHERE id = '".$mysqli->real_escape_string($_REQUEST['id'])."'");
				$workCategory = $workCategoryResult->fetch_array(MYSQLI_NUM);
            }

            $categoryResult = $mysqli->query("SELECT * FROM works_categories");
            while($category = $categoryResult->fetch_assoc()) {
                echo "
                  <a href='works.php?c=".$category['id']."'>
                    <div class='workCategory' id='workCategory".$category['id']."'>
                        <span class='categoriesText'"; if((empty($_REQUEST['id']) and $c == $category['id']) or (!empty($_REQUEST['id']) and $category['id'] == $workCategory[0])) {echo " style='color: #a22222;'";} echo ">".$category['category_name']."</span>
                    </div>
                  </a>
                  <div style='width:100%; height: 10px;'></div>
                ";
            }
        ?>
    </div>
    <div id="worksContent">
        <?php

        if(empty($_REQUEST['id'])) {
            $workResult = $mysqli->query("SELECT * FROM woo_works WHERE category = '".$c."' ORDER BY priority");
            $count = 0;

            while($work = $workResult->fetch_assoc()) {
                echo "
                    <a href='works.php?id=".$work['id']."' onmouseover='workOverlay(\"1\", \"overlay".$work['id']."\", \"workPreview".$work['id']."\")' onmouseout='workOverlay(\"0\", \"overlay".$work['id']."\", \"workPreview".$work['id']."\")'>
                        <div class='workPreview' id='workPreview".$work['id']."'>
                            <img src='img/works/preview/".$work['preview']."' style='width: 300px; height: 300px;' />
                            <br /><br />
                            <span class='nameFont'>".$work['name']."</span>
                            <div class='workOverlay' id='overlay".$work['id']."'></div>
                        </div>
                    </a>
                ";

                $count++;
            }
        } else {
            $photoResult = $mysqli->query("SELECT * FROM woo_works_photos WHERE work_id = '".$mysqli->real_escape_string($_REQUEST['id'])."'");

            echo "
                <div class='halfContainer' id='workPhotosContainer'>
            ";

            while($photo = $photoResult->fetch_assoc()) {
                echo "<a href='img/works/big/".$photo['big']."' rel='shadowbox[set]'><div><img src='img/works/small/".$photo['small']."' class='workPhoto' /></div></a><br />";
            }

            echo "
                </div>
                <div class='halfContainer' id='workDescriptionContainer'>
                    <span class='headerFont'>".$work['name']."</span>
                    <br /><br />
                    <span class='categoryFont'>техника: </span>".$work['technics']."
                    <br /><br />
                    ".nl2br($work['description'])."
                    <br /><br />
                    <div id='button'>
                        <a href='works.php?c=".$work['category']."'>
                            <span class='nameFont'>Назад</span>
                            <div class='overlay' id='buttonOverlay'></div>
                        </a>
                    </div>
                </div>
            ";
        }

        ?>
    </div>
    <div style="clear: both;"></div>
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
				<div class="pluso" style="margin: 10px 0 0 0; padding: 0;" data-background="transparent" data-options="medium,round,multiline,horizontal,counter,theme=04" data-services="vkontakte,odnoklassniki,facebook,twitter,google,moimir,email,print" data-url="http://woowoo.ru/" data-title="Woo Woo Design" data-description="Мы — команда художников-декораторов и изобретателей Woo Woo Design, в жизни которых главное — улыбка и созидание. Мы не будем ничего рассказывать о себе, Вам достаточно взглянуть на наши работы и знать, что это то, чем мы живём."></div>
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