<?php
include './backend/bdd.php';
include './backend/./mesfonction.php';
error_reporting(1);

?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Créer un post</title>
    <link rel="stylesheet" href="/style.css">

</head>

<body>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "<p><span>Nouveau Post Publié</span></p>";
            header("location:./backend/backend.php");

            if (isset($_FILES['miniature']) and !empty($_FILES['miniature']['name'])) {
                if (exif_imagetype($_FILES['miniature']['tmp_name']) == 2) {
                    $chemin = 'miniatures/' . $_FILES['miniature']['name'];
                    move_uploaded_file($_FILES['miniature']['tmp_name'], $chemin);
                } else {
                    $message = 'format jpg uniquement';
                }
            }

            $id = $_SESSION["id"];
            $authorId = $_SESSION["id"];
            $categoryId = $_POST['categoryId'];
            $titre = $_POST['titre'];
            $image_post = $chemin;
            $contenu =  htmlspecialchars($_POST['contenu']);

            $requete3 = "INSERT INTO `post` (`id_post`, `authorId`, `categoryId`, `titre`, `image_post`, `contenu`, `date_time`) VALUES ('" . NULL . "','" . $authorId . "','" . $categoryId . "','" . $titre . "','" . $image_post . "','" . $contenu . "', NOW() )";
            $resultat3 = $bdd->query($requete3);
            if ($resultat3) {
                //  echo "<p><span>done</span></p>";
            } else {
                echo "<p><span>Error</span></p>";
            }

        ?>

        <?php

        } else {

        ?>
  <div>
        <h3 class="titre">Nouveau Post</h3>
    </div>
    <div class="container">
            <div id="forms1">
                <form class="myform" action="./creation.php" method="POST" enctype="multipart/form-data">
                    <h4> Catégories: </h4>
                    <p>
                        <label for="cat1">Hardware</label>
                        <input type="radio" id="cat" name="categoryId" value="1"><br>
                        <label for="cat2">Gaming</label>
                         <input type="radio" id="cat" name="categoryId" value="2"><br>
                         <label for="cat3">Photos</label>
                         <input type="radio" id="cat" name="categoryId" value="3"><br>

                    </p>
                    <input type="texte" name="titre" class="areatitre" placeholder="titre" minlength="6">

                    <p>
                        <textarea name="contenu" id="textarea1" rows="5" cols="20" minlength="5" placeholder="commentaire..."></textarea>
                    </p>
                    <p><input type="file" name="miniature"></p>
                    <p><input type="submit" value="Poster" class="btncomment"></p>
                </form>
            </div>



            <?php

            ?>
        <?php
        }

        ?>
        <p>



    </div>
    <p>


</body>

</html>