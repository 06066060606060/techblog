<?php
include './bdd.php';
?>
<!DOCTYPE html>
<html lang="fr">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="./css/backend.css">
    <title>Liste des Posts</title>
</head>

<body>
    <header>
        <div class="topnav">
            <a href="./index.php">Accueil</a>
            <a href="./login.php" style="float:right">Login</a>
        </div>
    </header>
    <div class="liste_post">
        <div class="postlist">
            <h1>Liste des Posts</h1>
            <div id="btn2"><a href="./creation.php">Créer un nouveau post</a></div>
            <ul>
                <?php while ($post = $fullpost->fetch()) { ?>
                    <li>
                        <h2><?= $post['titre'] ?></h2><h5 style="color:aliceblue;">Visible:<?= $post['active']  ?></h5>
                        <a href="./backend/modifier-post.php?id=<?= $post['id_post'] ?>">Editer</a>
                        <a href="./backend/remove.php?id=<?= $post['id_post'] ?>"> Désactiver</a>
                        <a href="./backend/active.php?id=<?= $post['id_post'] ?>"> Activer</a></br>
                        <img src="<?= $post['image_post'] ?>" width="100" />
                        <p><?= $post['contenu'] ?></p>
                        <span>&#8205; </span>
                        <?php  $date = date_create( $post['date_time']); ?>
                        <p><?= date_format($date, 'd/m/Y H:i'); ?></p>
                        <a href="./backend/suppr.php?id=<?= $post['id_post'] ?>" style="color: red;"> Supprimer ce Post</a></br>
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