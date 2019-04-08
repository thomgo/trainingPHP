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

// Connexion to the database
          require ('db.php');

// Get the articles in the database
          $requete = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%Hh%imin le %d/%m/%Y\') AS datecrea FROM billets ORDER BY date_creation DESC LIMIT 5');

// Get an array of data and display the content of each article
          while ($billets = $requete->fetch())
          {
         ?>

         <div class="news">

           <!-- title and date -->
             <h3>
                 <?php echo htmlspecialchars($billets['titre']);
                 echo '<p class="date"> à' . $billets['datecrea'] . '</p>';
                 ?>
             </h3>

            <!-- Content -->
             <?php

             echo "<p>". htmlspecialchars($billets['contenu']) . "</p>";
             echo '<a href="commentaires.php?billet='. $billets['id'] . '">Voir les commentaires</a>';

             ?>

         </div>

         <?php
         }

// Close the request
         $requete->closeCursor();
         ?>

    </body>

    </html>
