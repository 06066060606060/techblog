<!DOCTYPE html>
<html>
<?php
include './backend/bdd.php';
include './backend/mesfonction.php';
setlocale(LC_TIME, 'fr_FR');
date_default_timezone_set('Europe/Paris');
	         
if(isset($_SESSION['loggedin'])) {
            echo "<div class='logbck'><p class='logged'>Vous êtes connecté &zwnj;", $_SESSION['name'];
            echo "<div class='btnbackend'><a href='./backend/backend.php'>Backend</a><a href='./backend/logout.php'>Déconnecter</a></div></div></p>";
        }
?>



<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/stylesheet.css">
  <script type="text/javascript" src="./js/anim.js"></script>
  <script src="./css/59ecaaffaa.js" crossorigin="anonymous"></script>
  <link rel="stylesheet"  href="./css/animate.min.css"/>
  <title>Margoula Tech Blog</title>
</head>

<body>

<div id="overlay"></div>


  <div id="login">
      <i class="fa-solid fa-circle-xmark" onclick="off()"></i>
    <h1>Login</h1>
    <form action="./backend/authenticate.php" method="post">
      <label for="username">
        <i class="fa-solid fa-user"></i>
      </label>
      <input type="text" name="username" placeholder="Username" id="username" required>
      <label for="password">
        <i class="fa-solid fa-lock"></i>
      </label>
      <input type="password" name="password" placeholder="Password" id="password" required>
      <input type="submit" value="Login">
    </form>
  </div>

  <div class="back" id="back"></div>
  <div class="central">
    <div class="containerprincipal">
      <header class="logo box animate__animated animate__backInDown">
        <a href="./index.php"> <img class="logom" src="./img/marg.png"></a>
      </header>

      <div class="headerbar animate__animated animate__backInDown">
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
        <div class="cat1 animate__animated animate__backInDown"><a href="index.php" style="color: white">Accueil</a></div>
        <div class="cat2  animate__animated animate__backInDown"><a href="index.php" style="color: white">News</a></div>
        <div class="cat3  animate__animated animate__backInDown">
          <form method="post"><input type="submit" name="cat3" value="hardware" class="menuInput"></form> </div>
        <div class="cat4  animate__animated animate__backInDown">
          <form method="post"><input type="submit" name="cat4" value="Gaming" class="menuInput"></form></div>
        <div class="cat5  animate__animated animate__backInDown">
          <form method="post"><input type="submit" name="cat5" value="Software" class="menuInput"></form></div>
        <div class="cat6 animate__animated animate__backInDown" onclick="on()">login</div>
      </nav>

      <main class="main">

        <?php
        indexpage();
        ?>
      </main>



      <aside class="sidebar box animate__animated animate__backInUp">
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
        <div class="newer animate__animated animate__backInLeft"><i class="fa-solid fa-arrow-left-long"></i></div>
        <div class="older animate__animated animate__backInRight"><i class="fa-solid fa-arrow-right-long"></i></div>
      </btn>

      <footer class="footer box animate__animated animate__backInUp">
        <a href="" style="color: white">Copyright</a>
      </footer>

      <div class="spacer">&zwnj; </div>
    </div>
  </div>
</body>

</html>