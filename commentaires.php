<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" />
        <title>Un blog</title>
        <link href="style.css" rel="stylesheet" />
    </head>

    <body>

        <h1>Un blog avec des commentaires</h1>
        <p><a href="blog.php">Vers la liste des articles</a></p>

<?php

// Connexion to the database
    require ('db.php');

// Get the concerned article with a GET methode
    $requete = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%Hh%imin le %d/%m/%Y\') AS datecrea FROM billets WHERE id = ?');
    $requete->execute(array(htmlspecialchars($_GET['billet'])));
    $billet = $requete->fetch();

?>

<!-- Display of the article -->
<div class="news">

<!-- Title and date -->
    <h3>
        <?php echo htmlspecialchars($billet['titre']);
        echo '<p class="date"> à' . $billet['datecrea'] . '</p>';
        ?>
    </h3>

<!-- Content and closing of the request -->
    <?php
    echo '<p>' . htmlspecialchars($billet['contenu']) . '</p>';

    $requete->closeCursor();

    ?>

</div>


<!-- Comments -->
<h2>Commentaires</h2>

<?php

// Prepare a request to get the comments with a GET methode
$requete = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%Hh%imin le %d/%m/%Y\') AS datecom FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC');
$requete->execute(array(htmlspecialchars($_GET['billet'])));

// Get an array of data and display the content of each comment
while ($commentaires = $requete->fetch()) {

echo '<p>' . htmlspecialchars($commentaires['auteur']) . ' à ' . $commentaires['datecom'] . '</p>';
echo '<p>'. htmlspecialchars($commentaires['commentaire']) . '</p>';
}

// Close the request
$requete->closeCursor();

?>

<!-- Form to post a comment -->
<form action="" method="post">
  <p>
    <label for="auteur"> Nom : </label>
    <input type="text" name="auteur" placeholder="votre nom">
  </p>
  <textarea name="commentaire" rows="8" cols="40" placeholder="votre commentaire"></textarea>
  <p>
    <input type="submit" value="Poster">
  </p>
</form>

<?php

// If there is information in the form they are added to the database
if (isset($_POST['auteur']) && isset($_POST['commentaire'])) {

// Treat the informations as variables and protect them
  $auteur = htmlspecialchars($_POST['auteur']);
  $commentaire = htmlspecialchars($_POST['commentaire']);
  $idBillet = htmlspecialchars($_GET['billet']);

  $requete = $bdd->prepare('INSERT INTO commentaires (auteur, commentaire, id_billet, date_commentaire) VALUES(?, ?, ?, NOW())');
  $requete->execute([$auteur, $commentaire, $idBillet]);

// Refresh the page to display the new comment right away
  header("Refresh:0");
}

 ?>

</body>

</html>
