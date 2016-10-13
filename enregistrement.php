<?php

$pseudo = htmlspecialchars($_POST['pseudo']);
$mdp = htmlspecialchars($_POST['mdp']);
$mdpconfirm = htmlspecialchars($_POST['mdpconfirm']);
$mail = htmlspecialchars($_POST['mail']);

if (empty($pseudo) && empty($mdp) && empty($mdpconfirm) && empty($mail)) {
  header("Location: inscription.php?code=1");
}

 ?>
