<?php
include './bdd.php';
?>

<!DOCTYPE html>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/backend.css">
    <title>Liste des Posts</title>

</head>

<body>
    <header>
        <div class="topnav">
            <a href="/index.php">Accueil</a>
            <a href="#">Contact </a>
            <a href="/login.php" style="float:right">Login</a>
        </div>
    </header>
    <div class="liste_post">
        <div class="postlist">
            <h1>Liste des Posts</h1>
            <div id="btn2"><a href="/creation.php">Créer un nouveau post</a></div>
            <ul>
                <?php while ($post = $posts->fetch()) { ?>
                    <li>
                        <h2><?= $post['titre'] ?></h2>
                        <a href="post.php?id=<?= $post['id'] ?>">Voir ce post</a>
                        <a href="post.php?id=<?= $post['id'] ?>">Editer ce post</a>
                        <a href="suppr.php?id=<?= $post['id'] ?>"> Supprimer ce Post</a></br>

                        <img src="<?= $post['image_post'] ?>" width="100" />

                        <p><?= $post['contenu'] ?></p>
                        <!-- <p>like:<?= $post['post_like'] ?> <span>&#8205; </span>commentaires:<?= $post['post_comms'] ?></p> -->
                        <span>&#8205; </span>
                        <p><?= $post['date_time'] ?></p>

                    </li>
                <?php } ?>

            </ul>



        </div>
    </div>


    <footer>
        <div class="footer">
            <h3></h3>
        </div>
    </footer>
</body>

</html>