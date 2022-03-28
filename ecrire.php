<?php
$bdd = new PDO("mysql:host=localhost;dbname=articles;charset=utf8", "root", "");
$mode_edition = 0;


// edit article
if (isset($_GET['edit']) and !empty($_GET['edit'])) {
    $mode_edition = 1;
    $edit_id = htmlspecialchars($_GET['edit']);
    $edit_article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $edit_article->execute(array($edit_id));
    if ($edit_article->rowCount() == 1) {

        $edit_article = $edit_article->fetch();
    } else {
        die('l\'article concerné n\'existe pas...');
    }
}


// creer article

if (isset($_POST['article_titre'], $_POST['article_contenu'])) {
    if (!empty($_POST['article_titre']) and !empty($_POST['article_contenu'])) {
        $article_titre = htmlspecialchars($_POST['article_titre']);
        $article_contenu = htmlspecialchars($_POST['article_contenu']);

        if ($mode_edition == 0) {

            $ins = $bdd->prepare('INSERT INTO articles (titre, contenu, date_time_publication) VALUES (?, ?, NOW())');
            $ins->execute(array($article_titre, $article_contenu));
            $lastid = $bdd->lastInsertId();

            if (isset($_FILES['miniature']) and !empty($_FILES['miniature']['name'])) {
                if (exif_imagetype($_FILES['miniature']['tmp_name']) == 2) {
                    $chemin = 'miniatures/' . $lastid . '.jpg';
                    move_uploaded_file($_FILES['miniature']['tmp_name'], $chemin);
                } else {
                    $message = 'format jpg uniquement';
                }
            }


            $message = 'Article Posté';
        } else {
            $update = $bdd->prepare('UPDATE articles SET titre = ?, contenu = ?, date_time_edition = NOW() WHERE ID = ?');
            $update->execute(array($article_titre, $article_contenu, $edit_id));
            header('location: lire.php?id=' . $edit_id);
        }
    } else {

        $message = 'remplir tout les champs';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    <header>
        <span class="welcom">Ecrire un article</span>
    </header>

    <form method="POST" enctype="multipart/form-data">

        <input type="text" name="article_titre" placeholder="titre" <?php if ($mode_edition == 1) {  ?> value="<?=
                                                                                                                $edit_article['titre'] ?>" <?php } ?></br>
        <textarea name="article_contenu" placeholder="Contenu de l'article">
        <?php if ($mode_edition == 1) {  ?><?=
                                            $edit_article['contenu'] ?><?php } ?> </textarea></br>
        <?php if ($mode_edition == 0) {  ?>
            <input type="file" name="miniature" /> </br>
        <?php } ?>


        <input type="submit" value="Envoyer l'article" />

    </form>
    <a href="/index.php">liste des articles</a>
    <retour>
        <p style="color: white;"><?php if (isset($message)) {
                                        echo $message;
                                    } ?></p>
    </retour>
    <br>

</body>

</html>