<?php
   include('.././bdd.php');
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $active_id = htmlspecialchars($_GET['id']);

    $active = $bdd->prepare('UPDATE blog SET post_like = post_like + 1 WHERE id = ?');
    $active->execute(array($active_id));
    header("location:javascript://history.go(-1)");
    //header('location:../index.php');
} ?>