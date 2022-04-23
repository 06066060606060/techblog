<?php
include './backend/bdd.php';
include './backend/./mesfonction.php';
error_reporting(1);

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Nouveau Post</title>
    <link rel="stylesheet" href="./css/stylesheet.css" />
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
        <div class="back"></div>
        <div class="central">
            <div class="headerbar1"></div>
    
            <nav class="menu">
                <div class="cat1">
                    <a href="./backend/backend.php" style="color: white">Retour </a>
                </div>
            </nav>
            <div class="container">
                <main class="mainPost">
                    <article>
                        <div class="box">
                <form class="myform" action="./creation.php" method="POST" enctype="multipart/form-data">
                    <h4> Catégories: </h4>
                    <p>
                        <label for="cat1">Hardware</label>
                        <input type="radio" id="cat" name="categoryId" value="1"><br>
                        <label for="cat2">Gaming</label>
                         <input type="radio" id="cat" name="categoryId" value="2"><br>
                         <label for="cat3">Software</label>
                         <input type="radio" id="cat" name="categoryId" value="3"><br>

                    </p>
                    <input type="texte" name="titre" class="areatitre" placeholder="titre" minlength="6">

                    <p>
                        <textarea name="contenu" id="textarea1" rows="15" cols="80" minlength="5" placeholder="commentaire..."></textarea>
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
  </article>
        </main>
    </div>
</div>
</body>

</html>