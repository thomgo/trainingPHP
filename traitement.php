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

if (isset($_POST['listid']) && !isset($_POST['taches'])) {
  $listid = (int)$_POST['listid'];

  $requete = $bdd->prepare("DELETE FROM list WHERE id= ?");
  $requete->execute(array($listid));

  $requete = $bdd->prepare("DELETE FROM taches WHERE listid= ?");
  $requete->execute(array($listid));
}


header('Location: index.php');
 ?>
