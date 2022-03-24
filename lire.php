<?php
$bdd = new PDO("mysql:host=localhost;dbname=articles;charset=utf8", "root", "");

if(isset($_GET['id']) AND !empty($_GET["id"])) {
  $get_id = htmlspecialchars($_GET['id']);
  $article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
  $article->execute(array($get_id));

  if($article->rowCount() == 1) {
      $article = $article->fetch();
      $titre = $article['titre'];
      $contenu = $article['contenu'];
      $date_time_publication = $article['date_time_publication'];
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>

</head>


<body>
   <h1><?= $titre ?></h1>
    <p><?= $contenu ?></p>
    <p><?= $date_time_publication ?>
</body>

</html>