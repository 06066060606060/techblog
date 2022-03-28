<?php

$bdd = new PDO("mysql:host=localhost;dbname=articles;charset=utf8", "root", "");
$articles = $bdd->query('SELECT * FROM articles ORDER BY date_time_publication DESC');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>

</head>

<body>
    <header>
        <span class="welcom">Liste des Articles</span>
    </header>
    <article>
        <ul>
            <?php while ($a = $articles->fetch()) { ?>
                <li>
                    <img src="miniatures/<?= $a['id'] ?>.jpg" width="100" /> </br>
                <a href="lire.php?id=<?= $a['id'] ?>"><?= $a['titre'] ?></br>
                    <a href="ecrire.php?edit=<?= $a['id'] ?>"> Modifier</a></br>
                    <a href="suppr.php?id=<?= $a['id'] ?>"> Supprimer</a></br>
                   <span>&#8205; </span>
                </li>
            <?php } ?>
        </ul>
        <button>
            <a href="ecrire.php"><input type="submit" value="Rédiger un article" /></a>
        </button>


        <h2 style="color: black;"> <?php
                                    $con = mysqli_connect("localhost", "root", "", "articles");
                                    // Check connection
                                    if (mysqli_connect_errno()) {
                                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                    } else {
                                        echo "Database found";
                                    }
                                    ?>
        </h2>
    </article>
    <footer>

    </footer>

</body>

</html>