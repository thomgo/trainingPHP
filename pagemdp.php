<html>

<head>
<title>Exercice de mot de passe</title>
</head>

<body>

<?php

// When no password display the form
if (!isset($_POST['password'])) {

echo '<form action="pagemdp.php" method="POST">

<label>Mot de passe : <input type="password" name="password"/></label>
<p><input type="submit" value="Voir les codes"></p>

</form>';
}

// If wrong password message
elseif ($_POST['password'] != "Simplon") {
  echo "Vous avez rentré le mauvais mot de passe";
}

// If good password show the codes
else {

echo '<p>Vous accédez à un espace strictement réservé au personnel, les codes suivants sont
très importants, d\'eux dépend l\'avenir de Simplon !!!!</p>';


echo '<p>Voici les codes...</p>';
}

?>

</body>
