<html>

    <head>
        <meta charset="utf-8" />
        <title>Un espace membres</title>
        <link href="style.css" rel="stylesheet" />
    </head>

    <body>

      <?php
      // Connexion to the database
                require ('db.php');

                if (!empty($_GET['code'])) {
                  if ($_GET['code'] == 1) {
                    echo "<p>Il est l'heure de vous connecter pour la première fois</p>";
                  }
                }
       ?>

       <!-- Html form -->
              <form action="enregistrement.php" method="post">

                  <label>Votre pseudo
                    <p>
                      <input type="text" name="pseudo">
                    </p>
                  </label>
                   <label>Mot de passe
                    <p>
                      <input type="password" name="mdp">
                    </p>
                  </label>

                <input type="submit" value="Me connecter">
              </form>

    </body>

  </html>
