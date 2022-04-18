<?php    include 'bdd.php';
  $id = null;
 if (!empty($_GET['id'])) { $id = $_REQUEST['id'];
 } if (null == $id) { header("location:index.php");
 } else { 
 
    $pdo = $bdd;
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) .
    $sql = "SELECT * FROM post where id_post =?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);

}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        	<link rel="stylesheet" href="style.css">
    </head>

    <body>

<br />
<div class="container">


<br />
<div class="span10 offset1">

<br />
<div class="row">

<br />
<h3>Edition</h3>
<p>

</div>
<p>



<br />
<div class="form-horizontal" >

<br />
<div class="control-group">
                        <label class="control-label">Titre</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['titre']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
                        <label class="control-label">Date</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['date_time']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />

<div class="post">
                        <label class="control-label">Image</label>

<br />
<div class="post-img">
                            <label class="checkbox">
                                <img src="<?php echo $data['image_post']; ?>" alt="image" />
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
                        <label class="control-label">Contenu</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['contenu']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
                        <label class="control-label">Activé:</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['active']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
                        <label class="control-label">catégorie:</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['categoryId']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="form-actions">
                        <a class="btn" href="index.php">Back</a>
</div>
<p>
</div>
<p>
</div>
<p>


</div>
<p>
<!-- /container -->
    </body>
</html>