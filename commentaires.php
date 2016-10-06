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

    <p>
    <?php
    echo htmlspecialchars($billet['contenu']);
    ?>
    </p>

</div>

</body>

</html>
