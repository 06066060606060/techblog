<?php
session_start();
//AFFICHAGE DE POST REDUIT PAGE D'ACCUEIL_____________________________
function indexpage()
{
    include './backend/bdd.php';
    //SI CATEGORIE 3 
    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['cat3'])) {
        $postx = $bdd->query('SELECT * FROM post WHERE active = 1 AND categoryId = 2 ORDER BY date_time DESC limit 4');
    } else
     if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['cat4'])) {
        $postx = $bdd->query('SELECT * FROM post WHERE active = 1 AND categoryId = 3 ORDER BY date_time DESC limit 4');
    } else 
    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['cat5'])) {
        $postx = $bdd->query('SELECT * FROM post WHERE active = 1 AND categoryId = 4 ORDER BY date_time DESC limit 4');
    } else {
        $postx = $bdd->query('SELECT * FROM post WHERE active = 1 ORDER BY date_time DESC limit 4');
    }

    while ($post = $postx->fetch()) {

        $content[] = [
            'id_post' => $post['id_post'],
            'titre_post' => $post['titre'],
            'contenu_post' => $post['contenu'],
            'image_post' => $post['image_post'],
            'time' =>  $post['date_time'],
            'post_like' => $post['post_like'],
            'authorId' => $post['authorId'],
        ];
        $date = date_create($post['date_time']);
    }
    for ($i = 0; $i < count($content); $i++) { ?>
        <article>
            <div class="box animate__animated animate__backInDown">
                <a class="1" href="./backend/post.php?id=<?= $content[$i]['id_post']; ?>">
                    <h2><?= $content[$i]["titre_post"]; ?></h2>
                    <h5>Posté le <?= date_format($date, 'd/m/Y H:i'); ?> par <?= $content[$i]['authorId']; ?></h5>
                    <img class="imgpost" src="<?= $content[$i]["image_post"]; ?>"></img>
                    <p class="shortened"><?= $content[$i]["contenu_post"]; ?></p>
                    <div class="social">
                        <span class="icon-like"><?= $content[$i]['post_like']; ?>
                            <a href="./backend/like.php?id=<?= $content[$i]['id_post']; ?>">
                                <i class="fa-solid fa-heart" onclick="this.style.color='red';"></i> </a>
                        </span>
                        <span class="link-post animate__animated animate__flash animate__delay-2s animate__slower animate__infinite"><a href="./backend/post.php?id=<?= $content[$i]['id_post']; ?>" style="color:rgb(37, 106, 255);"><?= "Lire la suite"; ?></a></span>
                        <span class="comm-post">3
                            <i class="fa-solid fa-message"></i>
                        </span>
                        </p>
                    </div>
                </a>
            </div>
        </article>
    <?php
        $bdd->connection = null;
    } ?>
    <?php
}


//RANDOM POST POPULAIRE_______________________________________________
function postpopfunction()
{
    include './backend/bdd.php';
    while ($post = $randpost->fetch()) {

        $content[] = [
            'id_post' => $post['id_post'],
            'titre_post' => $post['titre'],
            'image_post' => $post['image_post'],
        ];
    }

    for ($i = 0; $i < 3; $i++) { ?>
        <div class="poppost">
            <a href="./backend/post.php?id=<?= $content[$i]['id_post']; ?>">
                <h5 class="psttitre"><?php echo $content[$i]["titre_post"]; ?></h5>
                <img class="popimg" src="<?php echo $content[$i]['image_post']; ?>"></img>
            </a>
        </div>

    <?php
        $bdd->connection = null;
    } ?>
    <?php }

//___________________________________________________________________________

//_________________________FULL POST__________________________________
function FullPostFunction()
{
    include './bdd.php';
    if (isset($_GET['id']) and !empty($_GET["id"])) {
        $get_id = htmlspecialchars($_GET['id']);
        $_SESSION["idvar"] = $get_id;
        $post = $bdd->prepare('SELECT * FROM post WHERE id_post = ?');
        $post->execute(array($get_id));

        if ($post->rowCount() == 1) {
            $post = $post->fetch();
            $id = $post['id_post'];
            $titre = $post['titre'];
            $contenu = $post['contenu'];
            $image_post = $post['image_post'];
            $post_like = $post['post_like'];
            $date_time = $post['date_time'];
            $date = date_create($post['date_time']);
        } else {
            die('Cet article n\' existe pas!');
        }
    } else {
        die('erreur');
    } { ?>

        <article>
            <div class="box animate__animated animate__backInLeft">

                <h2><?= $titre ?></h2>
                <h5>Posté le <?= date_format($date, 'd/m/Y H:i'); ?> par admin</h5>
                <img class="imgfullpost" src="../<?= $image_post ?>"></img>
                <p class="contentFullPost"><?= $contenu ?></p>
                <div class="social">
                    <span class="icon-like"><?= $post_like ?>
                        <a href="./backend/like.php?id=<?= $id ?>">
                            <i class="fa-solid fa-heart" onclick="this.style.color='red';"></i> </a>
                    </span>
                    <span class="link-post"> &zwnj; </span>
                    </p>
                </div>

            </div>
        </article>


    <?php
        $bdd->connection = null;
    } ?>
    <?php }


function PostCommFunction()
{

    include './bdd.php';

    $var = $_SESSION["idvar"];
    $postx = $bdd->query('SELECT * FROM post_comment WHERE postId = ' . $var . ' ');
    $row = $postx->fetch();
    if (!$row) {
        echo "<h5 class='titlecom'>Pas de commentaires!</h5>";
    } else {
        $postx = $bdd->query('SELECT * FROM post_comment WHERE postId = ' . $var . '');
        while ($post = $postx->fetch()) {
            $content[] = [
                'postId' => $post['postId'],
                'titre' => $post['titre'],
                'contenu' => $post['contenu'],
                'pseudo' => $post['pseudo'],
                'date_time' => $post['date_time']


            ];
            //  $date = date_create($date_time);
            // $new = date_format($date, 'd/m/Y H:i');
        }
        for ($i = 0; $i < count($content); $i++) { ?>
            <h5 class="titlecom"><?= $content[$i]["titre"]; ?></h5>
            <p class="textcom"><?= $content[$i]['contenu']; ?></p>
            <h6 class="datecom">le <?= $content[$i]['date_time']; ?> par <?= $content[$i]['pseudo']; ?></h6>
    <?php
            $bdd->connection = null;
        }
    }

    ?>
    <?php

}


function commentaires()
{

    include './bdd.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "<p><span>Nouveau Commentaire Publié</span></p>";
        header("Refresh:0");
    ?>

        <?php
        $id = $_SESSION["idvar"];
        $varx =  htmlspecialchars($_POST['contenu']);
        $message = 'Commentaire Posté';
        $requete3 = "INSERT INTO `post_comment`(`postId`, `titre`, `pseudo`, `contenu`, `date_time`) VALUES ('" . $id . "','" . $_POST['titre'] . "','" . $_POST['pseudo'] . "','" . $varx . "', NOW() )";
        $resultat3 = $bdd->query($requete3);
        if ($resultat3) {
            //  echo "<p><span>done</span></p>";
        } else {
            echo "<p><span>Error</span></p>";
        }

        ?>


    <?php

    } else {

    ?>
        <div id="forms1">
            <form class="myform" action="./post.php?id=<?php echo $_SESSION["idvar"]; ?>" method="POST" enctype="multipart/form-data">
                <p>
                    <input type="texte" name="pseudo" class="areapseudo" placeholder="Pseudo">
                    <input type="texte" name="titre" class="areatitre" placeholder="titre">
                </p>
                <p>
                    <textarea name="contenu" id="textarea1" rows="5" cols="20" minlength="5" placeholder="commentaire..."></textarea>
                </p>
                <p><input type="submit" value="Commenter" class="btncomment"></p>
            </form>
        </div>



        <?php

        ?>
<?php
    }
}

//BACKGROUND ANIM

function MyBackground()
{
    echo str_repeat("<span></span>", 36);
}


function my_var_dump($array, $name = 'var')
{
    highlight_string("<?php\n\$$name =\n" . var_export($array, true) . ";\n?>");
}


?>