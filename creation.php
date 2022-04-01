<?php
include './bdd.php';
include './load_post.php';
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
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "<p>Nouveau Post Publié</p>";
    ?>
        <form action="./creation.php" method="POST" enctype="multipart/form-data">

            <p><label for="nom"> titre :</label> <input type="texte" name="titre"></p>
            <p><label for="nom">Contenu :</label> <input type="texte" name="contenu" id=""></p>
            <p><input type="file" name="miniature"></p>
            <p><input type="submit" value="OK"></p>


        </form>
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
        $requete3 = "INSERT INTO `mysocial`(`titre`, `contenu`, `image_post`, `date_time`) VALUES ('" . $_POST['titre'] . "','" . $varx . "','" . $chemin . "', NOW() )";
        $resultat3 = $bdd->query($requete3);
        if ($resultat3) {
            echo "<p>done</p>";
        } else {
            echo "<p>Error</p>";
        }

        ?>


    <?php


    } else {

    ?>
      
        <form action="./creation.php" method="POST" enctype="multipart/form-data">
            <p><label for="nom"> titre :</label> <input type="texte" name="titre"></p>
            <p><label for="nom">Contenu :</label> <input type="texte" name="contenu" id=""></p>
            <p><input type="file" name="miniature"></p>

            <p><input type="submit" value="OK"></p>


        </form>
        <?php

        ?>
    <?php
    }

    ?>



</body>

</html>



<div>