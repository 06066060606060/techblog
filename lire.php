<?php
$bdd = new PDO("mysql:host=localhost;dbname=articles;charset=utf8", "root", "");

if(isset($_GET['id']) AND !empty($_GET["id"])) {
  $get_id = htmlspecialchars($_GET['id']);
  $article = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
  $article->execute(array($get_id));

  if($article->rowCount() == 1) {
      $article = $article->fetch();
      $id = $article['id'];
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
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
     <img src="miniatures/<?= $id ?>.jpg" />
</head>


<body>
   <h1><?= $titre ?></h1>
    <p><?= $contenu ?></p>
    <p><?= $date_time_publication ?>
</body>

</html>