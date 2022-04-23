<?php include 'bdd.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
if (null == $id) {
    header("Location: .././index.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) { // on initialise nos erreurs
    $titreError = null;
    $timeError = null;
    $image_postError = null;
    $contenu_postError = null;

    $titre = $_POST['titre'];
    $image_post = $_POST['image_post'];
    $contenu_post = $_POST['contenu'];

    $valid = true;
    if (empty($titre)) {
        $titreError = 'Entrer un titre';
        $valid = false;
    }
    if (empty($contenu_post)) {
        $contenu_postError = 'Entrer un contenu';
        $valid = false;
    }

    if (empty($image_post)) {
        $image_postError = 'erreur';
        $valid = false;
    }

    if ($valid) {
        $pdo = $bdd;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE post SET titre = ?, image_post = ?, contenu = ? WHERE id_post = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($titre, $image_post, $contenu_post, $id));
        $bdd->connection = null;
        header("Location: ./backend.php");
    }
} else {

    $pdo = $bdd;
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM post where id_post = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $titre = $data['titre'];
    $image_post = $data['image_post'];
    $contenu_post = $data['contenu'];
    $bdd->connection = null;
}

?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Crud-Update</title>
    <link rel="stylesheet" href=".././css/stylesheet.css" />
</head>

<body>
    <div class="back"></div>
    <div class="central">
        <div class="headerbar1"></div>

        <nav class="menu">
            <div class="cat1">
                <a href="./backend.php" style="color: white">Retour </a>
            </div>
        </nav>
        <div class="container">
            <main class="mainPost">
                <article>
                    <div class="box animate__animated animate__backInLeft">
                        <form method="post" action="./edit.php?id=<?php echo $id; ?>">

                            <div class="control">
                                <label class="control-label">Titre</label>
                                <div class="controls">
                                    <input name="titre" type="text" placeholder="" value="<?php echo !empty($titre) ? $titre : ''; ?>">
                                    <?php if (!empty($titreError)) : ?>
                                        <span class="help-inline"><?php echo $titreError; ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="control">
                                <label class="control-label">Contenu du post:</label>
                                <div class="controls">
                                    <textarea class="textcont" name="contenu" type="textarea" placeholder="" rows="15" cols="80" minlength="5" value=""><?php echo !empty($contenu_post) ? $contenu_post : ''; ?></textarea></>
                                    <?php if (!empty($contenu_postError)) : ?>
                                        <span class="help-inline"><?php echo $contenu_postError; ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="control">
                                <label class="control-label">Lien image post:</label>
                                <div class="control">
                                    <input name="image_post" type="text" placeholder="" value="<?php echo !empty($image_post) ? $image_post : ''; ?>">
                                    <?php if (!empty($image_postError)) : ?>
                                        <span class="help-inline"><?php echo $image_postError; ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="control">
                                <div class="control">
                                    <img class="control-img" src="../<?php echo !empty($image_post) ? $image_post : ''; ?>" <input name="image_post" type="text" placeholder="" value="" />
                                </div>
                            </div>


                            <div class="form-actions">
                                <input type="submit" class="btn btn-modif" name="submit" value="submit">
                            </div>
                        </form>
                    </div>
                </article>
            </main>
        </div>
    </div>
</body>

</html>