<?php

include("scripts/connect.php");

if(!empty($_REQUEST['id'])) {
    $workResult = $mysqli->query("SELECT * FROM woo_works WHERE id = '".htmlspecialchars($_REQUEST['id'])."'");
    if($workResult->num_rows == 0) {
        header("Location: works.php");
    } else {
        $work = $workResult->fetch_assoc();
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

    <title>Работы | Woo Woo Design</title>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="js/shadowbox/shadowbox.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
    <script type="text/javascript" src="js/footer.js"></script>
    <script type="text/javascript" src="js/works.js"></script>

</head>

<body>

<div id="menu">
    <div id="menuContent">
        <a href="index.php"><div id="logo"></div></a>
        <div id="menuContainer">
            <div id="menuTopLine">
                <div class="menuTopLineSection"></div>
                <div class="menuTopLineSection"></div>
                <div class="menuTopLineSectionActive"></div>
                <div class="menuTopLineSection"></div>
            </div>
            <div id="menuPoints">
                <a href="contacts.php"><div class="menuPoint" id="mpContacts" onmouseover="mpHover(1, 'mpContacts')" onmouseout="mpHover(0, 'mpContacts')">Контакты</div></a>
                <a href="price.php"><div class="menuPoint" id="mpPrice" onmouseover="mpHover(1, 'mpPrice')" onmouseout="mpHover(0, 'mpPrice')">Прайс</div></a>
                <a href="works.php"><div class="menuPointActive" id="mpWorks">Работы</div></a>
                <a href="index.php"><div class="menuPoint" id="mpMain" onmouseover="mpHover(1, 'mpMain')" onmouseout="mpHover(0, 'mpMain')">Главная</div></a>
            </div>
        </div>
    </div>
</div>

<div id="content" style="text-align: center; letter-spacing: 10px;">
    <?php

    if(empty($_REQUEST['id'])) {
        $workResult = $mysqli->query("SELECT * FROM woo_works ORDER BY id DESC");
        $count = 0;

        while($work = $workResult->fetch_assoc()) {
            echo "
                <a href='works.php?id=".$work['id']."' onmouseover='workOverlay(\"1\", \"overlay".$work['id']."\", \"workPreview".$work['id']."\")' onmouseout='workOverlay(\"0\", \"overlay".$work['id']."\", \"workPreview".$work['id']."\")'>
                    <div class='workPreview' id='workPreview".$work['id']."'>
                        <img src='img/works/preview/".$work['preview']."' />
                        <br /><br />
                        <span class='nameFont'>".$work['name']."</span>
                        <div class='workOverlay' id='overlay".$work['id']."'></div>
                    </div>
                </a>
            ";

            $count++;
        }
    } else {
        $photoResult = $mysqli->query("SELECT * FROM woo_works_photos WHERE work_id = '".htmlspecialchars($_REQUEST['id'])."'");

        echo "
            <div class='halfContainer' id='workPhotosContainer'>
        ";

        while($photo = $photoResult->fetch_assoc()) {
            echo "<a href='img/works/big/".$photo['big']."' rel='shadowbox[set]'><div><img src='img/works/big/".$photo['big']."' class='workPhoto' /></div></a><br />";
        }

        echo "
            </div>
            <div class='halfContainer' id='workDescriptionContainer'>
                <span class='headerFont'>".$work['name']."</span>
                <br /><br />
                <span class='categoryFont'>техника: </span>".$work['technics']."
                <br /><br />
                ".$work['description']."
                <br /><br />
                <div id='button'>
                    <a href='works.php'>
                        <span class='nameFont'>Назад</span>
                        <div class='overlay' id='buttonOverlay'></div>
                    </a>
                </div>
            </div>
        ";
    }

    ?>
    <div style="clear: both;"></div>
</div>

<div id="footer">
    <div id="footerContent">
        <div class="footerSection">
            <a href="index.php"><span class="headerFont">WOO WOO DESIGN</span></a>
            <br />
            <span style="font-size: 16px;">Создание сайта и дизайн: <a href="http://airlab.by">airlab</a></span>
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