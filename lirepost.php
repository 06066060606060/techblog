<?php
include './bdd.php';

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