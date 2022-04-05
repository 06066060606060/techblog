<?php
include './bdd.php';
if(isset($_GET['id']) AND !empty($_GET)){
    $getid = $_GET['id'];

    $recupArticle = $bdd->prepare('SELECT * FROM post WHERE id = ?');
    $recupArticle->execute(array($getid));
    if($recupArticle->rowCount() > 0){
        $articleInfos = $recupArticle->fetch();
        $titre = $articleInfos['titre'];
        $description = $articleInfos['description'];


        if(isset($_POST['valider'])){
            $titre_saisi = htmlspecialchars($_POST['titre']);
            $description_saisie = nl2br(htmlspecialchars($_POST['description']));

            $updateArticle = $bdd->prepare('UPDATE post SET titre = ?, description = ? WHERE id = ?');
            $updateArticle->execute(array($titre_saisi, $description_saisie, $getid));
            header('Location: post.php');
        }

    }else
    {
        echo "Aucun article trouvé";
    }

}else{
    echo "Aucun identifiant trouvé";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modifier l'article</title>
    <meta charset="utf-8">
</head>
<body>
    <form method="POST" action="">
        <input type="texte" name="titre" value="<?= $titre; ?>">
        <br>
        <textarea name="description"><?= $description; ?></textarea>
        <br><br>
        <input type="submit" name="valider">
    </form>
</body>
</html>