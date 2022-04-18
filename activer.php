<?php
include './bdd.php';
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $active_id = htmlspecialchars($_GET['id']);

    $active = $bdd->prepare('UPDATE post SET active = TRUE WHERE id_post = ?');
    $active->execute(array($active_id));
    $bdd->connection = null;
   header('location:./backend.php');
}
 ?>