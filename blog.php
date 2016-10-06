<html>

    <head>
        <meta charset="utf-8" />
        <title>Un blog</title>
        <link href="style.css" rel="stylesheet" />
    </head>

    <body>

        <h1>Un blog avec des commentaires</h1>
        <p>Les articles</p>

        <?php

          require ('db.php');

          $requete = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%Hh%imin le %d/%m/%Y\') AS datecrea FROM billets ORDER BY date_creation DESC LIMIT 5');

          while ($billets = $requete->fetch())
          {
         ?>

         <div class="news">
             <h3>
                 <?php echo htmlspecialchars($billets['titre']);
                 echo '<p class="date"> à' . $billets['datecrea'] . '</p>';
                 ?>
             </h3>

             <p>
             <?php
             echo htmlspecialchars($billets['contenu']);
             ?>
             <br />

             <?php echo '<a href="commentaires.php?billet='. $billets['id'] . '">Voir les commentaires</a>';?>
             </p>

         </div>

         <?php
         }

         $requete->closeCursor();
         ?>

    </body>

    </html>
