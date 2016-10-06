<?php

// Connection to the database
require ('bd.php');

// Protect the data from the form
$pseudo = htmlspecialchars($_POST['pseudo']);
$message = htmlspecialchars($_POST['message']);

// Prepare and insert the data
$request = $bdd->prepare('INSERT INTO minichat(pseudo, message) VALUES(?, ?)');
$request->execute(array($pseudo, $message));

header('Location: minichat.php');

 ?>
