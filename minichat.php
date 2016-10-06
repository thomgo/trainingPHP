<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Minichat</title>
    </head>

<!-- Basic html form with messahe and pseudo -->
    <form action="minichat_treatment.php" method="POST">

    <label>Votre pseudo : <input type="text" name="pseudo"/></label>
    <label>Votre Message : <input type="text" name="message"/></label>

    <p><input type="submit" value="Envoyer"></p>

    </form>

<?php

// Connection to the database
require ('bd.php');

// Select the messages in database
$selection = $bdd->query('SELECT message, pseudo FROM minichat ORDER BY ID DESC LIMIT 10');

// Display the messages from the array
while ($chatdata = $selection->fetch()) {

echo '<p>'. $chatdata['pseudo']. ' - '  . $chatdata['message'] . '</p>';

}

$selection->closeCursor();

 ?>

 </html>
