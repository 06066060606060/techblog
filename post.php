<?php
include './bdd.php';
include './fonction.php';
?>


<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css" id="theme-link">
    <link rel="stylesheet" href="./css/background.css">
    <script src="https://kit.fontawesome.com/59ecaaffaa.js" crossorigin="anonymous"></script>
    <title>Articles</title>
</head>

    <header>
        <div class="topnav">
            <a href="./index.php">Accueil</a>
            <a class="btn-toggle">&#x263e;</a>
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
</html>