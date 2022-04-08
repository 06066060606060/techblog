<?php
include '.././bdd.php';
if(isset($_GET['id']) AND !empty($_GET)){
    $getid = $_GET['id'];
    $requete3 = $bdd->prepare('SELECT * FROM blog WHERE id = ?');
    $requete3->execute(array($getid));
    if($requete3->rowCount() > 0){
        $resultat3 = $requete3->fetch();
        
        $titre = $resultat3['titre'];
        $contenu = $resultat3['contenu'];


        if(isset($_POST['valider'])){
            $titre_saisi = htmlspecialchars($_POST['titre']);
            $contenu_saisie = htmlspecialchars($_POST['contenu']);
            $updatePost = $bdd->prepare('UPDATE blog SET titre = ?, contenu = ? WHERE id = ?');
            $updatePost->execute(array($titre_saisi, $contenu_saisie, $getid));
            header('Location: .././index.php');
        }

    }else
    {
        echo "Aucun post trouvé";
    }

}else{
    echo "id introuvable";
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
        <textarea name="contenu"><?= $contenu; ?></textarea>
        <br><br>
        <input type="submit" name="valider">
    </form>
</body>
</html>