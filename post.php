<html lang="en">
<?php
include './bdd.php';
include './mesfonction.php';
setlocale(LC_TIME, 'fr_FR');
date_default_timezone_set('Europe/Paris');
//error_reporting(0); //TODO hide error


?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/stylesheet.css">
  <script type="text/javascript" src="./js/anim.js"></script>
  <script src="https://kit.fontawesome.com/59ecaaffaa.js" crossorigin="anonymous"></script>
  <title>Document</title>
</head>

<body>

  <div class="background">
    <!-- <?php MyBackground(); ?> -->
  </div>

  <div class="back"></div>
  <div class="central">
    <div class="containerprincipal">
      <header class="logo box">
        <a href="./index.php"> <img class="logom" src="./img/marg.png"></a>
      </header>

      <div class="headerbar">
        <h1>
          <span style="--i:1">M</span>
          <span style="--i:2">a</span>
          <span style="--i:3">r</span>
          <span style="--i:4">g</span>
          <span style="--i:5">o</span>
          <span style="--i:6">u</span>
          <span style="--i:7">l</span>
          <span style="--i:8">a</span>
          <span style="--i:9">b &zwnj;</span>
          <span style="--i:10">Tech &zwnj;</span>
          <span style="--i:11">B</span>
          <span style="--i:12">l</span>
          <span style="--i:13">o</span>
          <span style="--i:14">g</span>

        </h1>
      </div>

      <nav class="menu">
        <div class="cat1"><a href="index.php" style="color: white">Retour</a></div>
      </nav>

      <main class="mainPost">
        <?php
        FullPostFunction();
        ?>

      </main>


      <aside class="sidebar box">
        <!-- a propos -->
        <h3 class="commentaires">Commentaires:</h3>
        <?php
        PostCommFunction();
        ?>

        <div class="btncom"><a href="" style="color: white">Ajouter un commentaire</a></div>
        <?php
        commentaires();
        ?>
      </aside>
      <footer class="footer box">
        <a href="" style="color: white">Copyright</a>
      </footer>

      <div class="spacer">&zwnj; </div>
    </div>
  </div>
</body>

</html>