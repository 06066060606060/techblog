<?php
$bdd = new PDO("mysql:host=localhost;dbname=mysocial;charset=utf8", "root", "");
$posts = $bdd->query('SELECT * FROM mysocial ORDER BY date_time DESC');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Posts</title>

</head>

<body>
    <header>
        <span class="welcom">
            <h1>Liste des Posts</h1>
        </span>
    </header>
    <article>
        <ul>
            <?php while ($post = $posts->fetch()) { ?>
                <li> 
                    <img src="/miniatures/<?= $post['id'] ?>.jpg" width="100"/>
                   <img src="<?= $post['image_post'] ?>" width="100" /> </br>
                    <a href="post.php?id=<?= $post['id'] ?>"><?= $post['titre'] ?></a></br>
                    <a href="suppr.php?id=<?= $post['id'] ?>"> Supprimer</a></br>
                    <p><?= $post['contenu'] ?></p>
                    <p>like:<?= $post['post_like'] ?></p>
                    <p>commentaires:<?= $post['post_comms'] ?></p>
                    <span>&#8205; </span>
                    
                </li>
            <?php } ?>
        </ul>

        <a href="creation.php"><input type="submit" value="Rédiger un article"></></a>


    </article>
    <footer>

    </footer>

</body>

</html>