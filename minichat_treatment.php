<?php

// Connection to the database
require ('bd.php');

// Protect the data from the form
$pseudo = htmlspecialchars($_POST['pseudo']);
$message = htmlspecialchars($_POST['message']);
$newmessage = htmlspecialchars($_POST['newmessage']);
$code = sha1($_POST['code']);
$supcode = sha1($_POST['supcode']);
$modifcode = sha1($_POST['modifcode']);

// Variables to check if the code is already used
$testcode = $bdd->query('SELECT pseudo FROM minichat WHERE code =" ' . $code . '"');
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

$suppression = $bdd->prepare('DELETE FROM minichat WHERE code = ? ');
$suppression->execute(array($supcode));

}

// If a modification code is sent check if it matched the database and update the message
if (!empty($modifcode) && !empty($newmessage) ) {

$modification = $bdd->prepare('UPDATE minichat SET message= ? WHERE code = ?');
$modification->execute(array($newmessage, $modifcode));
}

// Delete all the database
if (isset($_POST['delete'])) {
  $bdd->query('DELETE FROM minichat');
}

header('Location: minichat.php');

 ?>
