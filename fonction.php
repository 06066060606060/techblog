<?php

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
    }

    for ($i = 0; $i < count($content); $i++) { ?>
        <div class="container">
            <h2><?php echo $content[$i]["titre_post"]; ?></h2>
            <h5><?php echo $content[$i]["time"]; ?></h5>
            <img class="imgpost" src="<?php echo $content[$i]["image_post"]; ?>"></img>

            <p class="shortened"><?php echo $content[$i]["contenu_post"]; ?></p>
            <p><a href="post.php?id=<?= $content[$i]['id']; ?>" style="color:rgb(37, 106, 255);"><?php echo "Lire la suite..."; ?></a></p>
            <div class="social">
                <p>
                    <span class="icon-like"><?php echo $content[$i]["post_like"]; ?><i class="fa-solid fa-heart" onclick="this.style.color='red';"></i></span>
                    <span class="icon-comms"> <?php echo $content[$i]["post_comms"];
                                                echo ($content[$i]["post_comms"] > 1) ? ' Commentaires' : ' Commentaire'; ?></span>
                </p>

            </div>
        </div>

    <?php 
        $bdd->connection = null;
         } ?>
<?php }


function FullPostFunction()
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
    }

         $i = 1;  { ?> //TODO $i = id
        <div class="container">
            <h2><?php echo $content[$i]["titre_post"]; ?></h2>
            <h5><?php echo $content[$i]["time"]; ?></h5>
            <img class="imgpost" src="<?php echo $content[$i]["image_post"]; ?>"></img>

            <p><?php echo $content[$i]["contenu_post"]; ?></p>
            <div class="social">
                <p>
                    <span class="icon-like"><?php echo $content[$i]["post_like"]; ?><i class="fa-solid fa-heart" onclick="this.style.color='red';"></i></span>
                    <span class="icon-comms"> <?php echo $content[$i]["post_comms"];
                                                echo ($content[$i]["post_comms"] > 1) ? ' Commentaires' : ' Commentaire'; ?></span>
                </p>

            </div>
        </div>

    <?php 
        $bdd->connection = null;
         } ?>
<?php }

function PopularFunction()
{
    include './bdd.php';
    while ($post = $posts->fetch()) {

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


    <?php } ?>
<?php }



function MyBackground()
{
    echo str_repeat("<span></span>", 36);
}
?>