<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Minichat</title>
    </head>

    <form action="minichat_treatment.php" method="POST">

    <label>Votre pseudo : <input type="text" name="pseudo"/></label>
    <label>Votre Message : <input type="text" name="message"/></label>

    <p><input type="submit" value="Envoyer"></p>

    </form>

<?php

require ('bd.php');

$selection = $bdd->query('SELECT message, pseudo FROM minichat ORDER BY ID DESC LIMIT 10');

while ($chatdata = $selection->fetch()) {

echo '<p>'. $chatdata['pseudo']. ' - '  . $chatdata['message'] . '</p>';

}

$selection->closeCursor();

 ?>

 </html>
