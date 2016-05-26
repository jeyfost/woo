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

    <title>Woo Woo Design</title>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
    <script type="text/javascript" src="js/index.js"></script>

</head>

<body>

<div id="menu">
    <div id="menuContent">
        <a href="index.php"><div id="logo"></div></a>
        <div id="menuContainer">
            <div id="menuTopLine">
                <div class="menuTopLineSection"></div>
                <div class="menuTopLineSection"></div>
                <div class="menuTopLineSection"></div>
                <div class="menuTopLineSectionActive"></div>
            </div>
            <div id="menuPoints">
                <a href="contacts.php"><div class="menuPoint" id="mpContacts" onmouseover="mpHover(1, 'mpContacts')" onmouseout="mpHover(0, 'mpContacts')">Контакты</div></a>
                <a href="price.php"><div class="menuPoint" id="mpPrice" onmouseover="mpHover(1, 'mpPrice')" onmouseout="mpHover(0, 'mpPrice')">Прайс</div></a>
                <a href="works.php"><div class="menuPoint" id="mpWorks" onmouseover="mpHover(1, 'mpWorks')" onmouseout="mpHover(0, 'mpWorks')">Работы</div></a>
                <a href="index.php"><div class="menuPointActive" id="mpMain">Главная</div></a>
            </div>
        </div>
    </div>
</div>

<div style="clear: both;"></div>

<div id="content">
    <div class="centerContainer">
        <div class="halfContainer" id="mainHalf">
            <span class="headerFont">Кто мы?</span>
            <br /><br />
            <?php

            $textResult = $mysqli->query("SELECT * FROM text");
            $text = $textResult->fetch_assoc();

            echo $text['team_text'];

            ?>
        </div>
        <div class="halfContainer">
            <?php

            $photosResult = $mysqli->query("SELECT * FROM about_photos");
            $photos = $photosResult->fetch_assoc();

            echo "
                <div class='personContainer' id='ePerson'>
                    <img src='img/team/".$photos['e_dark']."' />
                    <br /><br />
                    <span class='nameFont'>Евгения</span>
                    <div class='overlay' id='eOverlay'></div>
                </div>
                <div style='position: relative; float: left; width: 10px; height: 100%; min-height: 300px;'></div>
                <div class='personContainer' id='nPerson'>
                    <img src='img/team/".$photos['n_dark']."' />
                    <br /><br />
                    <span class='nameFont'>Наталия</span>
                    <div class='overlay' id='nOverlay'></div>
                </div>
            ";

            ?>

            <div id="info"></div>
        </div>
        <div style="clear: both;"></div>
    </div>
</div>

<div style="clear: both;"></div>

</body>

</html>