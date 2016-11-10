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

    <title>Контактная информация | Woo Woo Design</title>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
    <script type="text/javascript" src="js/footer.js"></script>
    <script type="text/javascript" src="js/contacts.js"></script>
    <script type="text/javascript" src="js/works.js"></script>

</head>

<body>

<div id="menu">
    <div id="menuContent">
        <a href="index.php"><div id="logo"></div></a>
        <div id="menuContainer">
            <div id="menuTopLine">
                <div class="menuTopLineSectionActive"></div>
                <div class="menuTopLineSection"></div>
                <div class="menuTopLineSection"></div>
                <div class="menuTopLineSection"></div>
            </div>
            <div id="menuPoints">
                <a href="contacts.php"><div class="menuPointActive" id="mpContacts">Контакты</div></a>
                <a href="price.php"><div class="menuPoint" id="mpPrice"  onmouseover="mpHover(1, 'mpPrice')" onmouseout="mpHover(0, 'mpPrice')">Прайс</div></a>
                <a href="works.php?c=1"><div class="menuPoint" id="mpWorks" onmouseover="mpHover(1, 'mpWorks')" onmouseout="mpHover(0, 'mpWorks')">Работы</div></a>
                <a href="index.php"><div class="menuPoint" id="mpMain" onmouseover="mpHover(1, 'mpMain')" onmouseout="mpHover(0, 'mpMain')">Главная</div></a>
            </div>
        </div>
    </div>
</div>
<div style="clear: both;"></div>

<div id="content" style="text-align: center;">
    <img src="img/plane.png" />
    <br /><br />
    <span class="headerFont">Свяжитесь с нами</span>
    <br /><br />
    <?php

    $contactsResult = $mysqli->query("SELECT * FROM woo_contacts");
    $contacts = $contactsResult->fetch_assoc();

    ?>
    <a href="mailto:woowoodesign@gmail.com" id="email">woowoodesign@gmail.com</a>
    <br />
    <?php echo $contacts['phone1'] ?>
    <br />
    <?php echo $contacts['phone2'] ?>
    <br /><br />
    <form id="contactFrom" method="POST">
        <input type="text" id="nameInput" />
        <br />
        <input type="text" id="emailInput" />
        <br />
        <input type="text" id="themeInput" />
        <br />
        <textarea id="messageInput" onkeydown='textAreaHeight(this)'></textarea>
        <br /><br />
        <div id="responseField"></div>
        <br />
        <div style="width: 600px; margin: 0 auto;">
            <div class="g-recaptcha" data-sitekey="6LfNbyETAAAAABCu7b6qfU96UE16I_qi2r1kr8-5"></div>
            <div id="button">
                <span class="nameFont">Отправить</span>
                <div class="overlay" id="buttonOverlay"></div>
            </div>
            <div style="clear: both;"></div>
        </div>
    </form>
</div>

<div id="footer">
    <div id="footerContent">
        <div class="footerSection">
            <a href="index.php"><span class="headerFont">WOO WOO DESIGN</span></a>
            <br />
            <span style="font-size: 16px;">Создание сайта и дизайн: <a href="http://airlab.by/">airlab</a></span>
        </div>
        <div class="footerSection" style="width: 34%;">
            <span class="headerFont">Как нас найти?</span>
            <br /><br />
            <?php

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

<script src='https://www.google.com/recaptcha/api.js' async defer></script>

</body>

</html>