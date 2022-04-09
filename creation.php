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
    <link rel="stylesheet" href="./css/style2.css">
    <title>Document</title>
</head>

<body>
<header>
        <div class="topnav">
            <a href="index.php">Accueil</a>
            <a href="#">Contact </a>
        </div>
    </header>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "<p><span>Nouveau Post Publié</span></p>";
    ?>
    <div class="forms">
        <form class="myform" action="./creation.php" method="POST" enctype="multipart/form-data">
            <p><label for="nom"> titre :</label> <input type="texte" name="titre"></p>
            <p><label for="nom">Contenu :</label> <input type="texte" name="contenu" id=""></p>
            <p><input type="file" name="miniature"></p>
            <p><input type="submit" value="OK"></p>

        </form>
    </div>
        <?php
     

        if (isset($_FILES['miniature']) and !empty($_FILES['miniature']['name'])) {
            if (exif_imagetype($_FILES['miniature']['tmp_name']) == 2) {
                $chemin = 'miniatures/' . $_FILES['miniature']['name'];
                move_uploaded_file($_FILES['miniature']['tmp_name'], $chemin);
            } else {
                $message = 'format jpg uniquement';
            }
        }

        $varx =  htmlspecialchars($_POST['contenu']);
        $message = 'Article Posté';
        $requete3 = "INSERT INTO `blog`(`titre`, `contenu`, `image_post`, `date_time`) VALUES ('" . $_POST['titre'] . "','" . $varx . "','" . $chemin . "', NOW() )";
        $resultat3 = $bdd->query($requete3);
        if ($resultat3) {
            echo "<p><span>done</span></p>";
        } else {
            echo "<p><span>Error</span></p>";
        }

        ?>
    <?php

    } else {

    ?>
      <div class="forms">
        <form class="myform" action="./creation.php" method="POST" enctype="multipart/form-data">
            <p><label class="label" for="nom"> titre :</label> <input type="texte" name="titre"></p>
            <p><label class="label" for="nom">Contenu :</label> <input type="texte" name="contenu" id=""></p>
            <p><input type="file" name="miniature"></p>

            <p><input type="submit" value="OK"></p>


        </form>
    </div>
        <?php

        ?>
    <?php
    }

    ?>

<footer>
        <div class="footer">
            <h3>Copyright</h3>
        </div>
    </footer>

</body>

</html>



<div>