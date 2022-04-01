<?php
include './lirepost.php';
?>

<!DOCTYPE html>


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