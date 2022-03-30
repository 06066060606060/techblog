<?php
$bdd = new PDO("mysql:host=localhost;dbname=mysocial;charset=utf8", "root", "");

if (isset($_GET['id']) and !empty($_GET["id"])) {
    $get_id = htmlspecialchars($_GET['id']);
    $post = $bdd->prepare('SELECT * FROM mysocial WHERE id = ?');
    $post->execute(array($get_id));

    if ($post->rowCount() == 1) {
        $post = $post->fetch();
        $id = $post['id'];
        $titre = $post['titre'];
        $contenu = $post['contenu'];
        $image_post = $post['image_post'];
        $post_like = $post['post_like'];
        $post_comms = $post['post_comms'];
        $date_time = $post['date_time'];
    } else {
        die('Cet article n\' existe pas!');
    }
} else {
    die('erreur');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
</head>


<body>
    <h1><?= $titre ?></h1>
    <p><?= $contenu ?></p>
    <img src="<?= $post['image_post'] ?>" width="50%" /> </br>
    <p><?= $post_like ?></p>
    <p><?= $post_comms ?></p>
    <p><?= $date_time ?></p>
</body>

</html>