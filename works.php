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
    <meta name="keywords" content="роспись, дизайн, рисунок, мозаика, декорации, интерьер, детская">
    <meta name="description" content="Команда художников-декораторов и изобретателей Woo Woo Design, в жизни которых главное — улыбка и созидание.">

    <link rel='stylesheet' type='text/css' href='css/style.css'>
    <link rel='stylesheet' type='text/css' href='js/shadowbox/shadowbox.css'>

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
                        <span class='categoriesText'"; if((empty($_REQUEST['id']) and $c == $category['id']) or (!empty($_REQUEST['id']) and $category['id'] == $workCategory[0])) {echo " style='color: #a22222;'";} echo ">".iconv('cp1251', 'utf8', $category['category_name'])."</span>
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
        	if($_REQUEST['c'] == 4) {
        		$workResult = $mysqli->query("SELECT * FROM woo_works ORDER BY id DESC");
			} else {
        		$workResult = $mysqli->query("SELECT * FROM woo_works WHERE category = '".$c."' ORDER BY priority");
			}

            $count = 0;

            while($work = $workResult->fetch_assoc()) {
                echo "
                    <a href='works.php?id=".$work['id']."' onmouseover='workOverlay(\"1\", \"overlay".$work['id']."\", \"workPreview".$work['id']."\")' onmouseout='workOverlay(\"0\", \"overlay".$work['id']."\", \"workPreview".$work['id']."\")'>
                        <div class='workPreview' id='workPreview".$work['id']."'>
                            <img src='img/works/preview/".$work['preview']."' style='width: 300px; height: 300px;' />
                            <br /><br />
                            <span class='nameFont'>".iconv('cp1251', 'utf8', $work['name'])."</span>
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
                    <span class='headerFont'>".iconv('cp1251', 'utf8', $work['name'])."</span>
                    <br /><br />
                    <span class='categoryFont'>техника: </span>".iconv('cp1251', 'utf8', $work['technics'])."
                    <br /><br />
                    ".iconv('cp1251', 'utf8', nl2br($work['description']))."
                    <br /><br />
                    <div id='button'>
                        <a href='works.php?c=".$work['category']."'>
                            <span class='nameFont'>Назад</span>
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

            echo iconv('cp1251', 'utf8', $contacts['country']).", г. ".iconv('cp1251', 'utf8', $contacts['city'])."<br />".iconv('cp1251', 'utf8', $contacts['address']);

            ?>
        </div>
        <div class="footerSection">
            <span class="headerFont">Как с нами связаться?</span>
            <br /><br />
            <?php

            echo $contacts['phone1']."<br /><a href='mailto:".$contacts['email']."'>".$contacts['email']."</a>";

            ?>
        </div>
    </div>
</div>

<div style="clear: both;"></div>

</body>

</html>