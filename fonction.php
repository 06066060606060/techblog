<?php

//AFFICHAGE DE POST REDUIT PAGE D'ACCUEIL
function PostFunction()
{
    include './bdd.php';
    while ($post = $posts->fetch()) {
        
        $content[] = [
            'id' => $post['id'],
            'titre_post' => $post['titre'],
            'contenu_post' => $post['contenu'],
            'image_post' => $post['image_post'],
            'time' =>  $post['date_time'],
            'post_like' => $post['post_like'],
            'post_comms' => $post['post_comms']
        ];
        $date = date_create( $post['date_time']);
    }

    for ($i = 0; $i < count($content); $i++) { ?>
        <div class="container">
            
            <h2><?php echo $content[$i]["titre_post"]; ?></h2>
            <h5><?php echo date_format($date, 'd/m/Y H:i'); ?></h5>
            <img class="imgpost" src="<?php echo $content[$i]["image_post"]; ?>"></img>

            <p class="shortened"><?php echo $content[$i]["contenu_post"]; ?></p>

            <div class="social">
                <p>
                   <span class="icon-like"><?php echo $content[$i]["post_like"]; ?> <a href="./backend/like.php?id=<?= $content[$i]['id'];?>"><i class="fa-solid fa-heart" onclick="this.style.color='red';"></i></span></a>
                    <span class="link-post"><a href="post.php?id=<?= $content[$i]['id']; ?>" style="color:rgb(37, 106, 255);"><?php echo "Lire la suite..."; ?></a></span>
                </p>

            </div>
        </div>

    <?php
        $bdd->connection = null;
    } ?>
    <?php }



//AFFICHAGE D'UN POST AVEC L'ID DE L'URL
function FullPostFunction()
{
    include './bdd.php';
    if (isset($_GET['id']) and !empty($_GET["id"])) {
        $get_id = htmlspecialchars($_GET['id']);
        $post = $bdd->prepare('SELECT * FROM blog WHERE id = ?');
        $post->execute(array($get_id));
    
        if ($post->rowCount() == 1) {
            $post = $post->fetch();
            $id = $post['id'];
            $titre = $post['titre'];
            $contenu = $post['contenu'];
            $image_post = $post['image_post'];
            $post_like = $post['post_like'];
            $date_time = $post['date_time'];
            $date = date_create( $post['date_time']);
        } else {
            die('Cet article n\' existe pas!');
        }
    } else {
        die('erreur');
    }
    { ?> 
       
            <h2><?php echo $titre ?></h2>
            <h5><?php echo  $contenu ?></h5>
            <img class="imgpost2" src="<?php echo $image_post ?>"></img>
            <p><?php echo date_format($date, 'd/m/Y H:i');  ?></p>
            <div class="social2">
                <p>
                    <span class="icon-like"><?php echo $post_like ?><a href="./backend/like.php?id=<?= $post['id'];?>"><i class="fa-solid fa-heart" onclick="this.style.color='red';"></i></span></a>
                   
                </p>

            </div>
       

    <?php
        $bdd->connection = null;
    } ?>
    <?php }


//RANDOM POST POPULAIRE
function PopularFunction()
{
    include './bdd.php';
    while ($post = $randpost->fetch()) {

        $content[] = [
            'id' => $post['id'],
            'titre_post' => $post['titre'],
            'image_post' => $post['image_post'],
        ];
    }

    for ($i = 0; $i < 3; $i++) { ?>
        <div class="containerpopular">
            <i class="titrepop"><?php echo $content[$i]["titre_post"]; ?></i>

            <p class="lienpop">
                <a href="post.php?id=<?= $content[$i]['id']; ?>" style="color:rgb(37, 106, 255);">
                    <img class="imgpost" src="<?php echo $content[$i]["image_post"]; ?>"></img></a>
            </p>
        </div>

    <?php
        $bdd->connection = null;
    } ?>
<?php }

function my_var_dump($array, $name = 'var')
{
    highlight_string("<?php\n\$$name =\n" . var_export($array, true) . ";\n?>");
}
//my_var_dump($_FILES, 'row');


function MyBackground()
{
    echo str_repeat("<span></span>", 36);
}
?>