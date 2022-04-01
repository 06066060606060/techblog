    <!-- //-- BOUCLE BDD > TABLE -->
    <?php while ($post = $posts->fetch()) {

        $content[] = [

            'titre_post' => $post['titre'],
            'contenu_post' => $post['contenu'],
            'image_post' => $post['image_post'],
            'time' =>  $post['date_time'],
            'post_like' => $post['post_like'],
            'post_comms' => $post['post_comms']
        ];
    }

    $_SESSION['varname'] = $content;

    $bdd->connection = null;
    ?>