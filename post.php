<?php
include './bdd.php';
include './fonction.php';
?>


<!DOCTYPE html>


<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/articles.css">
    <link rel="stylesheet" href="./css/background.css">
    <script src="https://kit.fontawesome.com/59ecaaffaa.js" crossorigin="anonymous"></script>
    <title>Articles</title>
</head>

    <header>
        <div class="topnav">
            <a href="./index.php">Accueil</a>
            <a href="#">Contact </a>
        </div>
    </header>

    <div class="background">
        <?php MyBackground(); ?>
    </div>


    <div class="container2">
    <?php FullPostFunction(); ?>
    </div>
    <footer>
        <div class="footer">
            <h3>Copyright</h3>
        </div>
    </footer>
</body>

</html>