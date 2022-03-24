<?php
$bdd = new PDO("mysql:host=localhost;dbname=articles;charset=utf8", "root", "");
$articles = $bdd->query('SELECT * FROM articles ORDER BY date_time_publication DESC');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <link rel="stylesheet" href="style2.css">
</head>


<body>
<header>
            <span class="welcom">Liste des Articles</span>
    </header>
    <article>
        <ul>
            <?php while ($a = $articles->fetch()) { ?>
                <li><a href="lire.php?id=<?= $a['id'] ?>"><?= $a['titre'] ?></li>
            <?php } ?>
        </ul>
        <button>
        <a href="ecrire.php"><input class="w3-button w3-ripple w3-red" type="submit" value="Rédiger un article" />
        </button>
    </article>

</body>

</html>