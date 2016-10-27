<?php
// Connexion to the database
    require ('db.php');

if (isset($_POST['list'])) {
  $list = htmlspecialchars($_POST['list']);

  $request = $bdd->prepare("INSERT INTO list(nom) VALUES (?)");
  $request->execute(array($list));
}

if (!empty($_POST['taches'])) {
  $taches = htmlspecialchars($_POST['taches']);
  $listid = (int)$_POST['listid'];

  $requete = $bdd->prepare("INSERT INTO taches(nom, listid, datecrea) VALUES (?, ?, NOW())");
  $requete->execute(array($taches, $listid));
}


header('Location: index.php');
 ?>
