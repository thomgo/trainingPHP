<?php

$pseudo = htmlspecialchars($_POST['pseudo']);
$mdp = htmlspecialchars($_POST['mdp']);
$mdpconfirm = htmlspecialchars($_POST['mdpconfirm']);
$mail = htmlspecialchars($_POST['mail']);

if (empty($pseudo) && empty($mdp) && empty($mdpconfirm) && empty($mail)) {
  header("Location: inscription.php?code=1");
}

if ($mdp != $mdpconfirm) {
  header("Location: inscription.php?code=2");
}

if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)) {
  header("Location: inscription.php?code=3");
}


 ?>
