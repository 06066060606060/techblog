<?php //TODO edit
include '.././bdd.php';
if(isset($_GET['id']) AND !empty($_GET)){
    $getid = $_GET['id'];
    $recupArticle = $bdd->prepare('SELECT * FROM blog WHERE id = ?');
    $recupArticle->execute(array($getid));
    if($recupArticle->rowCount() > 0){
        $articleInfos = $recupArticle->fetch();
        $titre = $articleInfos['titre'];
        $description = $articleInfos['contenu'];


        if(isset($_POST['valider'])){
            $titre_saisi = htmlspecialchars($_POST['titre']);
            $description_saisie = nl2br(htmlspecialchars($_POST['contenu']));
            $updateArticle = $bdd->prepare('UPDATE blog SET titre = ?, contenu = ? WHERE id = ?');
            $updateArticle->execute(array($titre_saisi, $description_saisie, $getid));
            header('Location: .././post.php');
        }

    }else
    {
        echo "Aucun post trouvé";
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