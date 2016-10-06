<?php

require ('bd.php');

$pseudo = htmlspecialchars($_POST['pseudo']);
$message = htmlspecialchars($_POST['message']);

$request = $bdd->prepare('INSERT INTO minichat(pseudo, message) VALUES(?, ?)');
$request->execute(array($pseudo, $message));

header('Location: minichat.php');

 ?>
