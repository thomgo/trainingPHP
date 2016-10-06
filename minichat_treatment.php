<?php

// Connection to the database
require ('bd.php');

// Protect the data from the form
$pseudo = htmlspecialchars($_POST['pseudo']);
$message = htmlspecialchars($_POST['message']);
$code = (int) $_POST['code'];
$supcode = (int) $_POST['supcode'];

// Prepare and insert the data
$request = $bdd->prepare('INSERT INTO minichat(pseudo, message, code) VALUES(?, ?, ?)');
$request->execute(array($pseudo, $message, $code));

$bdd->exec('DELETE FROM minichat WHERE code = ' . $supcode);

header('Location: minichat.php');

 ?>
