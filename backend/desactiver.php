<?php
include './bdd.php';
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $suppr_id = htmlspecialchars($_GET['id']);

    $suppr = $bdd->prepare('UPDATE post SET active = FALSE WHERE id_post = ?');
    $suppr->execute(array($suppr_id));
    $bdd->connection = null;
   header('location: ./backend.php');
}
 ?>