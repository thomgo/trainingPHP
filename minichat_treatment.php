<?php

require ('bd.php');

$request = $bdd->prepare('INSERT INTO minichat(pseudo, message) VALUES(?, ?)');
$request->execute(array(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['message'])));

header('Location: minichat.php');

 ?>
