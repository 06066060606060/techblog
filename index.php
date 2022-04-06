<!DOCTYPE html>
<html lang="fr">
<?php
include './bdd.php';
include './fonction.php';
setlocale(LC_TIME, 'fr_FR');
date_default_timezone_set('Europe/Paris');

?>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Margouilla-Tech Blog</title>
    <link rel="stylesheet" href="./css/style.css" id="theme-link">
    <link rel="stylesheet" href="./css/responsive.css">
    <link rel="stylesheet" href="./css/background.css">
    <script src="https://kit.fontawesome.com/59ecaaffaa.js" crossorigin="anonymous"></script>

</head>

<body>

    <header>
        <div class="topnav">
            <a href="./index.php">Accueil</a>
            <a class="btn-toggle">&#x263e;</a>
            <a href="./backend/login.php">Login</a>
        </div>
        <div class="header">
            <img src="./css/background.jpg" </img>
        </div>
    </header>


    <div class="background">
        <?php MyBackground(); ?>
    </div>

    <article>

        <div class="row" />

        <div class="colonegauche">
            <?php PostFunction(); ?>
        </div>

        <div class="colonedroite">
            <div class="container">
                <h2>A Propos de ce Blog</h2>
                <div class="img1" style="height:100px;"></div>
                <p>Some text..</p>
            </div>
            <div class="container">
                <h3>Suivez Nous</h3>
                <a href="url"><i class="fa-brands fa-facebook-square fa-3x" id="facebook"></i></a>
                <a href="url"><i class="fa-brands fa-github-square fa-3x" id="github"></i></a></< />
                <a href="url"><i class="fa-brands fa-twitter-square fa-3x" id="twitter"></i></a>

            </div>



            <div class="container">
                <h3>Post Populaire</h3>
                <?php PopularFunction(); ?>
            </div>

        </div>
        </div>

    </article>

    <footer>
        <div class="footer">
            <h3>Copyright</h3>
        </div>
    </footer>
    <script>
        // Select the button
        const btn = document.querySelector(".btn-toggle");
        // Select the stylesheet <link>
        const theme = document.querySelector("#theme-link");

        // Listen for a click on the button
        btn.addEventListener("click", function() {
            if (theme.getAttribute("href") == "./css/style.css") {
                theme.href = "./css/Light-theme.css";
            } else {
                theme.href = "./css/style.css";
            }
        });
    </script>

</body>

</html>