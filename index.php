<!DOCTYPE html>


<?php $bdd = new PDO("mysql:host=localhost;dbname=mysocial;charset=utf8", "root", "");
$posts = $bdd->query('SELECT * FROM mysocial ORDER BY date_time DESC');
include './load_bdd.php';
include './affichage.php';
?>


<?php $con = mysqli_connect("localhost", "root", "", "mysocial");
// test connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    echo " <error style=color:white;>Connexion Base de Donnée OK</error> <br>";
}
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
    <script src="./js/anim.js"></script>

</head>

<body>

    <header>
        <div class="topnav">
            <a href="/index.php">Accueil</a>
            <a href="#">Contact </a>
            <a href="/liste.php" style="float:right">Login</a>
        </div>
        <div class="header">
            <h1>Margouilla-Tech Blog</h1>
            <img src="./img/background.jpg" </img>
        </div>
    </header>


    <div class="background">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>

    <article>

        <div class="row" />

        <div class="colonegauche">
            <?php MyFunction(); ?>
        </div>

        <div class="colonedroite">
            <div class="container">
                <h2>About Me</h2>
                <div class="img1" style="height:100px;"></div>
                <p>Some text..</p>
            </div>
            <div class="container">
                <h3>Follow Me</h3>
                <i class="fa-brands fa-facebook-square fa-2x"></i>
                <i class="fa-brands fa-instagram-square fa-2x "></i>
                <i class="fa-brands fa-twitter-square fa-2x"></i>
            </div>
            <div class="container">
                <h3>Popular Post</h3>
                <div class="img2">
                    <p></p>
                </div>
                <div class="img3">
                    <p></p>
                </div>
                <div class="img4">
                    <p></p>
                </div>
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