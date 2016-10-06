<?php

// Connection to the database
require ('bd.php');

// Protect the data from the form
$pseudo = htmlspecialchars($_POST['pseudo']);
$message = htmlspecialchars($_POST['message']);
$code = (int) $_POST['code'];
$supcode = (int) $_POST['supcode'];

// Variables to check if the code is already used
$testcode = $bdd->query('SELECT pseudo FROM minichat WHERE code = ' . $code);
$donnees = $testcode->fetch();

// Prepare and insert the data
if (!empty($pseudo) && !empty($message) && !empty($code)) {

  if ($donnees == false) {
    $request = $bdd->prepare('INSERT INTO minichat(pseudo, message, code) VALUES(?, ?, ?)');
    $request->execute(array($pseudo, $message, $code));
  }
  else {
    header('Location: minichat.php?code=1');
    exit();
  }
}

// If a suppression code is sent check if it matched the database and delete the message
if (!empty($supcode)) {

$bdd->exec('DELETE FROM minichat WHERE code = ' . $supcode);

}

header('Location: minichat.php');

 ?>
