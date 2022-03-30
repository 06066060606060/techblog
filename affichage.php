<?php
include 'load_bdd.php';

function MyFunction()
{
    $content = $_SESSION['varname'];
    for ($i = 0; $i < count($content); $i++) { ?>
        <div class="container">
            <h2><?php echo $content[$i]["titre_post"]; ?></h2>
            <h5><?php echo $content[$i]["time"]; ?></h5>
            <img class="imgpost" src="<?php echo $content[$i]["image_post"]; ?>"></img>
            <p>Lire la Suite</p>
            <p><?php echo $content[$i]["contenu_post"]; ?></p>
            <div class="social">
                <p class="like"><span class="icon-thumbs-up-alt"></span> <?php echo $content[$i]["post_like"];
                                                                            echo ($content[$i]["post_like"] > 1) ? ' Likes' : ' like'; ?></p>
                <p class="comment"><span class="icon-comment-alt"></span> <?php echo $content[$i]["post_comms"];
                                                                            echo ($content[$i]["post_comms"] > 1) ? ' Commentaires' : ' Commentaire'; ?></p>
            </div>
        </div>


    <?php } ?>
<?php } ?>