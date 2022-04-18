<html lang="en">
<?php
include './bdd.php';
include './mesfonction.php';
setlocale(LC_TIME, 'fr_FR');
date_default_timezone_set('Europe/Paris');

?>



<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/stylesheet.css">
  <link rel="stylesheet" href="./css/background.css">
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
        <div class="cat1" onclick="toggleNav()">Catégories</div>
        <div id="cat2"><a href="index.php" style="color: white">General</a></div>
        <div id="cat3">
          <form action="index.php" method="post"><input type="submit" name="cat3" value="hardware" class="menuInput"></form>
        </div>
        <div id="cat4" onclick="">
        <form action="index.php" method="post"><input type="submit" name="cat4" value="Software" class="menuInput"></form>
        </div>
        <div id="cat5">
        <form action="index.php" method="post"><input type="submit" name="cat5" value="Photos" class="menuInput"></form>
        </div>
        <div class="cat6"><a href="./backend.php" style="color: white">login</a></div>
      </nav>

      <main class="main">

        <?php
        indexpage();
        ?>
      </main>




      <aside class="sidebar box">
        <!-- a propos -->
        <h3>A propos</h3>
        <img class="abimg" src="./img/avatar.png"></img>
        <p class="abtext">Demo blog formation Simplon 2022</p>
        <!-- post populaires -->
        <h3>Post Populaires</h3>
        <div class="postp">
          <?php postpopfunction(); ?>
        </div>
        <!-- Social -->
        <div class="social">
          <h3>Contact</h3>
          <a href="https://github.com/06066060606060/"><i class="fa-brands fa-github-square fa-2x" id="github"></i></a></h< />
          <a href="https://twitter.com/@xmicky/"><i class="fa-brands fa-twitter-square fa-2x" id="twitter"></i></a>
        </div>
      </aside>

      <btn class="next">
        <div class="newer"><i class="fa-solid fa-arrow-left-long"></i></div>
        <div class="older"><i class="fa-solid fa-arrow-right-long"></i></div>
      </btn>

      <footer class="footer box">
        <a href="" style="color: white">Copyright</a>
      </footer>

      <div class="spacer">&zwnj; </div>
    </div>
  </div>
</body>

</html>