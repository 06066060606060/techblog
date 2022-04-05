<?php
$bdd = new PDO("mysql:host=localhost;dbname=mysocial;charset=utf8", "root", "");
$posts = $bdd->query('SELECT * FROM blog ORDER BY date_time DESC');
// $rands = $bdd->query("SELECT * FROM post ORDER BY RAND()");
     ?>
