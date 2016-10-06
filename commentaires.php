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

    require ('db.php');

    $requete = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%Hh%imin le %d/%m/%Y\') AS datecrea FROM billets WHERE id = ?');
    $requete->execute(array($_GET['billet']));
    $billet = $requete->fetch();

?>

<div class="news">

    <h3>
        <?php echo htmlspecialchars($billet['titre']);
        echo '<p class="date"> à' . $billet['datecrea'] . '</p>';
        ?>
    </h3>

    <?php
    echo '<p>' . htmlspecialchars($billet['contenu']) . '</p>';

    $requete->closeCursor();

    ?>

</div>

<h2>Commentaires</h2>

<?php

$requete = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%Hh%imin le %d/%m/%Y\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
$requete->execute(array($_GET['billet']));

while ($commentaires = $requete->fetch()) {

echo '<p>' . htmlspecialchars($commentaires['auteur']) . ' à ' . $commentaires['date_commentaire_fr'] . '</p>';
echo '<p>'. htmlspecialchars($commentaires['commentaire']) . '</p>';
}

$requete->closeCursor();

?>

</body>

</html>
