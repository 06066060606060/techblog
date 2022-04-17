<?php
$bdd = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", "root", "");
$posts = $bdd->query('SELECT * FROM post WHERE active = TRUE ORDER BY date_time DESC' );
$randpost = $bdd->query('SELECT * FROM post WHERE active = TRUE ORDER BY RAND()' );
$fullpost = $bdd->query('SELECT * FROM post ORDER BY date_time DESC' );
// $rands = $bdd->query("SELECT * FROM post ORDER BY RAND()");
     ?>
  