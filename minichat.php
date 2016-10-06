<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Minichat</title>
    </head>


<!-- Check if the treatment page returned an error code -->
<?php
if (!empty($_GET['code'])) {

  if ($_GET['code'] == 1) {
  echo '<p>Ce code est déja utilisé, veuillez en saisir un autre</p>';
  }

  else {
  echo '<p>Une erreur s\'est produite</p>';
  }

}
?>

<!-- Basic html form with messahe and pseudo -->
    <form action="minichat_treatment.php" method="POST">

    <p>
      <label>Votre pseudo : <input type="text" name="pseudo"/></label>
    </p>
    <p>
      <label>Votre Message : <input type="text" name="message"/></label>
    </p>
    <p>
      <label>Votre code (vous permettra de supprimer votre message) : <input type="number" name="code"/></label>
    </p>

    <p><input type="submit" value="Envoyer"></p>

    </form>

<?php

// Connection to the database
require ('bd.php');

// Select the messages in database
$selection = $bdd->query('SELECT message, pseudo FROM minichat ORDER BY ID DESC LIMIT 10');

// Display the messages from the array
while ($chatdata = $selection->fetch()) {

  if (!empty($chatdata['pseudo'] && $chatdata['message'] )) {

echo '<p>'. $chatdata['pseudo']. ' - '  . $chatdata['message'] . '</p>' .
'<p>
  <form action="minichat_treatment.php" method="POST">
    <label>Votre code : <input type="number" name="supcode"/></label>
    <input type="submit" value="Supprimer">
  </form>
</p>';
}

}

$selection->closeCursor();

 ?>

</html>
