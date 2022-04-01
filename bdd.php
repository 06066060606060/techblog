<?php
$bdd = new PDO("mysql:host=localhost;dbname=mysocial;charset=utf8", "root", "");
$posts = $bdd->query('SELECT * FROM mysocial ORDER BY date_time DESC');
     ?>

<?php $con = mysqli_connect("localhost", "root", "", "mysocial");
// test connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
   // echo " <error style=color:white;>Connexion BDD OK</error> <br>";
}
?>
