<?php

$pseudo = htmlspecialchars($_POST['pseudo']);
$mdp = htmlspecialchars($_POST['mdp']);
$mdpconfirm = htmlspecialchars($_POST['mdpconfirm']);
$mail = htmlspecialchars($_POST['mail']);

if (empty($pseudo) && empty($mdp) && empty($mdpconfirm) && empty($mail)) {
  header("Location: inscription.php?code=1");
  exit;
}

if ($mdp != $mdpconfirm) {
  header("Location: inscription.php?code=2");
  exit;
}

if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)) {
  header("Location: inscription.php?code=3");
  exit;
}

require ('db.php');

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
