<!DOCTYPE html>
<?php
include './bdd.php';
include './fonction.php';
?>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Margouilla-Tech Blog</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/articles.css">
    <link rel="stylesheet" href="./css/responsive.css">
    <link rel="stylesheet" href="./css/background.css">
    <script src="https://kit.fontawesome.com/59ecaaffaa.js" crossorigin="anonymous"></script>

</head>

<body>

    <header>
        <div class="topnav">
            <a href="./index.php">Accueil</a>
            <a href="#">Contact </a>
            <a href="./backend/login.php" style="float:right">Login</a>
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
                <h3>Follow Me</h3>
                <i class="fa-brands fa-facebook-square fa-2x"></i>
                <i class="fa-brands fa-github-square fa-2x "></i>
                <i class="fa-brands fa-twitter-square fa-2x"></i>
            </div>


            
            <div class="container">
                <h3>Popular Post</h3>
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

</body>

</html>