<!doctype html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel='stylesheet' type='text/css' href='css/style.css'>

    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <title>Прайс-лист | Woo Woo Design</title>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>

</head>

<body>

<div id="menu">
    <div id="menuContent">
        <a href="index.php"><div id="logo"></div></a>
        <div id="menuContainer">
            <div id="menuTopLine">
                <div class="menuTopLineSection"></div>
                <div class="menuTopLineSectionActive"></div>
                <div class="menuTopLineSection"></div>
                <div class="menuTopLineSection"></div>
            </div>
            <div id="menuPoints">
                <a href="contacts.php"><div class="menuPoint" id="mpContacts" onmouseover="mpHover(1, 'mpContacts')" onmouseout="mpHover(0, 'mpContacts')">Контакты</div></a>
                <a href="price.php"><div class="menuPointActive" id="mpPrice">Прайс</div></a>
                <a href="works.php"><div class="menuPoint" id="mpWorks" onmouseover="mpHover(1, 'mpWorks')" onmouseout="mpHover(0, 'mpWorks')">Работы</div></a>
                <a href="index.php"><div class="menuPoint" id="mpMain" onmouseover="mpHover(1, 'mpMain')" onmouseout="mpHover(0, 'mpMain')">Главная</div></a>
            </div>
        </div>
    </div>
</div>

<div style="clear: both;"></div>

</body>

</html>