<!DOCTYPE html>
<!-- CONNEXION BDD -->
<?php $bdd = new PDO("mysql:host=localhost;dbname=mysocial;charset=utf8", "root", "");
$posts = $bdd->query('SELECT * FROM mysocial ORDER BY date_time DESC');
$suggestion = $bdd->query('SELECT * FROM suggestion');
?>

<!-- TEST CONNEXION BDD-->
<?php $con = mysqli_connect("localhost", "root", "", "mysocial");
// test connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    echo " <error style=color:white;>Database found</error> <br>";
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
            <a href="#">Accueil</a>
            <a href="#">Contact </a>
            <a href="#" style="float:right">Login</a>
        </div>
        <div class="header">
            <h1>Margouilla-Tech Blog</h1>
            <img src="./img/background.jpg" </img>
        </div>
    </header>

    <?php while ($post = $posts->fetch()) {
         //-- BOUCLE BDD > TABLE
        $content[] = [
         
            'titre_post' => $post['titre'],
            'contenu_post' => $post['contenu'],
            'image_post' => $post['image'],
            'time' =>  $post['date_time'],
            'likes' => $post['like'],
            'comms' => $post['comms']
        ];
    }

    while ($sugg = $suggestion->fetch()) {

        $tabSuggestions[] = [
          
        ];
    }


    ?>

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
  
            <div class="row"/>
     
                <div class="colonegauche">
                <?php for ($i = 0; $i < count($content); $i++) { ?>
                    <div class="container">
                        <h2><?php echo $content[$i]["titre_post"]; ?></h2>
                        <h5><?php echo $content[$i]["time"]; ?></h5>
                        <img class="imgpost" src="<?php echo $content[$i]["image_post"]; ?>"></img>
                        <p>Lire la Suite</p>
                        <p><?php echo $content[$i]["contenu_post"]; ?></p>
                        <div class="social">
                        <p class="like"><span class="icon-thumbs-up-alt"></span> <?php echo $content[$i]["likes"]; echo ($content[$i]["likes"] > 1)?' Likes' :' like';?></p>
                        <p class="comment"><span class="icon-comment-alt"></span> <?php echo $content[$i]["comms"]; echo ($content[$i]["comms"] > 1)?' Commentaires' :' Commentaire';?></p>
                    </div>
                    </div>
               
                    <?php } ?>
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