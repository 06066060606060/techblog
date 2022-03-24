<?php
$bdd = new PDO("mysql:host=localhost;dbname=articles;charset=utf8", "root", "");

if (isset($_POST['article_titre'], $_POST['article_contenu'])) {
    if (!empty($_POST['article_titre']) and !empty($_POST['article_contenu'])) {
        $article_titre = htmlspecialchars($_POST['article_titre']);
        $article_contenu = htmlspecialchars($_POST['article_contenu']);
        $ins = $bdd->prepare('INSERT INTO articles (titre, contenu, date_time_publication)
               VALUES (?, ?, NOW())');
        $ins->execute(array($article_titre, $article_contenu));
    
        $message = 'Article Posté';

    } else {

        $message = 'remplir tout les champs';


    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>


<body>
    <header>
            <span class="welcom">Ecrire un article</span>
    </header>

    <form method="POST">
        <section>
            <titre>
                <input type="text" name="article_titre" placeholder="titre" />
            </titre>
            <article>
                <textarea name="article_contenu" placeholder="Contenu de l'article" rows="20" cols="20" resize="none">
                </textarea>
            </article>
     
            <bouton>
                <input class="w3-button w3-ripple w3-red" type="submit" value="Envoyer l'article" />
                </bouton>
                <bouton>
                <a href="/index.php"><input class="w3-button w3-ripple w3-red" type="submit();" value="Liste des articles" />
                </bouton>
                
            <retour>
   <p><?php if (isset($message)) {
        echo $message;
    } ?></p> 
    </retour>
            </section>

       
    </form>
    <br>
 
</body>

</html>