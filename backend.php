<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Liste des Posts</title>
    <link rel="stylesheet" href="./css/stylesheet.css">
    <link rel="stylesheet" href="./css/backend.css">

</head>

<body>
<div class="back"></div>
    <div class="container">
        <div class="navbarb">
        <div id="btnaccueil"><a href="index.html" style="color: white">Page d'accueil</a></div>
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
                            <th>Lecture</th>
                        <p>
                        <th>Edition</th>
                        <p>
                        <th>Activer</th>
                        <p>
                            <th>Désactiver</th>
                        <p>
                            <th>Actif</th>
                        <p>

                    </thead>

                    <tbody>
                        <?php include 'bdd.php';
                        $pdo = $bdd;
                        $sql = 'SELECT * FROM post ORDER BY id_post DESC';
                        foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>' . $row['titre'] . '</td><p>';
                            echo '<td>' . $row['date_time'] . '</td><p>';
                            echo '<td><img src="' . $row['image_post'] . '"></td><p>';
                            echo '<td><p class="short">' . $row['contenu'] . '</p></td><p>';
                            echo '<td>' . $row['categoryId'] . '</td><p>';
                            echo '<td>';
                            echo '<a class="btn" href="post.php?id=' . $row['id_post'] . '">Lire</a>'; // un autre td pour le bouton d'edition
                            echo '</td><p>';
                            echo '<td>';
                            echo '<a class="btn btn-success" href="edit.php?id=' . $row['id_post'] . '">Editer</a>'; // un autre td pour le bouton d'update
                            echo '</td><p>';
                            echo '<td>';
                            echo '<a class="btn btn-active" href="activer.php?id=' . $row['id_post'] . ' ">Activer</a>'; // un autre td pour le bouton de suppression
                            echo '</td><p>';
                            echo '<td>';
                            echo '<a class="btn btn-danger" href="desactiver.php?id=' . $row['id_post'] . ' ">Désactiver</a>'; // un autre td pour le bouton de suppression
                            echo '</td><p>';
                            echo '<td>' . $row['active'] . '</td><p>';
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