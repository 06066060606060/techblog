<?php
$bdd = new PDO("mysql:host=localhost;dbname=articles;charset=utf8", "root", "");
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $suppr_id = htmlspecialchars($_GET['id']);

    $suppr = $bdd->prepare('DELETE FROM articles WHERE id = ?');
    $suppr->execute(array($suppr_id));
   header('location: test-index.php');
}
 ?>