<?php
session_start();
// If the  not logged redirect to index...

if (!isset($_SESSION['loggedin'])) {
	header('Location: .././index.php');
	exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Liste des Posts</title>
    <link rel="stylesheet" href=".././css/stylesheet.css">
    <link rel="stylesheet" href=".././css/backend.css">

</head>

<body>
<div class="back"></div>
    <div class="container">
        <div class="navbarb">
        <div id="btnaccueil"><a href=".././index.php" style="color: white">Page d'accueil</a></div>
        <div id="btnnewpost"><a href=".././creation.php" style="color: white">Creer Nouveau Post</a></div>
        <div id="btnnewpost"><a href="./logout.php" style="color: white">Se Déconnecter</a></div>
        <p style="font-size: 18px; padding:10px; color:white">Salut, <?=$_SESSION['name']?></p> 
        <p style="color:white; padding-left:10px">Liste de tes Posts:</p>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <th>titre</th>
                        <p>
                            <th>Date</th>
                        <p>                     
                            <th>image du post</th>
                        <p>
                            <th>contenu du post</th>
                       
                        <p>
                        <th>Catégorie</th>
                        <p>
                            <th>Aperçu</th>
                        <p>
                        <th>Edition</th>
                        <p>
                        <th>Activer</th>
                        <p>
                            <th>Désactiver</th>
                        <p>
                            <th>Actif</th>
                        <p>
                            <th>Supprimer</th>
                        <p>

                    </thead>

                    <tbody>
                        <?php include './bdd.php';
                        $userid = $_SESSION['id'];
                        $pdo = $bdd;
                        $sql = 'SELECT * FROM post WHERE authorId = (' . $userid . ') ORDER BY id_post DESC ';
                        foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>' . $row['titre'] . '</td><p>';
                            echo '<td>' . $row['date_time'] . '</td><p>';
                            echo '<td><img src="../' . $row['image_post'] . '"></td><p>';
                            echo '<td><p class="short">' . $row['contenu'] . '</p></td><p>';
                            echo '<td>' . $row['categoryId'] . '</td><p>';
                            echo '<td>';
                            echo '<a class="btn" href="./post.php?id=' . $row['id_post'] . '">Lire</a>'; // un autre td pour le bouton d'edition
                            echo '</td><p>';
                            echo '<td>';
                            echo '<a class="btn btn-success" href="./edit.php?id=' . $row['id_post'] . '">Editer</a>'; // un autre td pour le bouton d'update
                            echo '</td><p>';
                            echo '<td>';
                            echo '<a class="btn btn-active" href="./activer.php?id=' . $row['id_post'] . ' ">Activer</a>'; // un autre td pour le bouton activer
                            echo '</td><p>';
                            echo '<td>';
                            echo '<a class="btn" style="background-color:orange;" href="./desactiver.php?id=' . $row['id_post'] . ' ">Désactiver</a>'; // un autre td pour le bouton desactiver
                            echo '</td><p>';
                            echo '<td>' . $row['active'] . '</td><p>';
                            echo '<td>';
                            echo '<a class="btn btn-danger" href="./supprimer.php?id=' . $row['id_post'] . ' ">Supprimer</a>'; // un autre td pour le bouton desactiver
                            echo '</td><p>';
                            echo '</tr><p>';
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>