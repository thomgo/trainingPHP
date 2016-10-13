<?php

// Treat the data in variables and protect them
$pseudo = htmlspecialchars($_POST['pseudo']);
$mdp = sha1(htmlspecialchars($_POST['mdp']));
$mdpconfirm = sha1(htmlspecialchars($_POST['mdpconfirm']));
$mail = htmlspecialchars($_POST['mail']);

// Check if there is no empty field
if (empty($pseudo) && empty($mdp) && empty($mdpconfirm) && empty($mail)) {
  header("Location: inscription.php?code=1");
  exit;
}

// Check if it is the right password
if ($mdp != $mdpconfirm) {
  header("Location: inscription.php?code=2");
  exit;
}

// Addtionnaly checking for the email adresse with regex
if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)) {
  header("Location: inscription.php?code=3");
  exit;
}

// Connexion to the data base
require ('db.php');

// Check if the pseudo is already used otherwise add the user
$data = $bdd->query('SELECT * FROM membres WHERE pseudo="'.$pseudo.'" ');
$test = $data->fetch();

if ($test) {
  header("Location: inscription.php?code=4");
  exit;
}
else {
  $request = $bdd->prepare('INSERT INTO membres (pseudo, mdp, email, date_inscription) VALUES(:pseudo, :mdp, :email, NOW())');
  $request->execute([
    'pseudo'=>$pseudo,
    'mdp'=>$mdp,
    'email'=>$mail,
  ]);
  header("Location: connexion.php?code=1");
  exit;
}


 ?>
