<!DOCTYPE html>
<html lang="fr">
	<head>
        <title>Ajouter un utilisateur</title>
		<meta charset="utf-8">
	</head>
	<body>
		<h1>Ajouter un utilisateur</h1>
		<form method="post">
			<label>Username:</label></br>
            <input type="text" name="Username"></br>
			<label>Password</label></br>
            <input type="text" name="Password"></br>
			<input type="submit" value="Ajouter"></br>
		</form>
		<?php
		if (isset($_POST['Username'])) {
			$mysqli = new mysqli("localhost", "root", "", "mysocial");
            $mysqli->set_charset("utf8");
            $requete = "INSERT INTO users VALUES(NULL, '" . $_POST['Username'] . "', '" . $_POST['Password'] . "')";
		    $resultat = $mysqli->query($requete);
            if ($resultat)
                echo "<p>Un utilisateur a été ajouté</p>";
            else
                echo "<p>Erreur</p>";
		}
		?>
	</body> 
</html>