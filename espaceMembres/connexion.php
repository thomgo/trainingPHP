<?php
  session_start();

// If your session is not over you are redirected to the member page
  if (isset($_SESSION['pseudo']) && isset($_SESSION['mdp'])) {
    header("Location: espacemembre.php");
    exit;
  }

// Code 3 means you came to connexion page because your session was over
//If it is not so and you have cookies then you are redirected to member page
  if (isset($_COOKIE['pseudo']) && isset($_COOKIE['mdp']) && $_GET['code'] != 3) {
    header("Location: espacemembre.php?code=2");
    exit;
  }

// Connexion to the database
  require ('db.php');

// If the user try to connect with the form
  if (isset($_POST['pseudo']) && isset($_POST['mdp'])) {

// Treat the variables
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $mdp = sha1(htmlspecialchars($_POST['mdp']));

// Check in the database if the user and password are correct
  $request = $bdd->prepare('SELECT * FROM membres WHERE pseudo= :pseudo AND mdp= :mdp');
  $request->execute([
    'pseudo'=>$pseudo,
    'mdp'=>$mdp
  ]);

$user = $request->fetch();

// If so the session start
if ($user) {
  $_SESSION['pseudo'] = $pseudo;
  $_SESSION['mdp'] = $mdp;

  if (isset($_POST['cookie'])) {
    setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);
    setcookie('mdp', $mdp, time() + 365*24*3600, null, null, false, true);
  }

  header("Location: espacemembre.php");
  exit;
}
else {
  echo "Ce compte n'existe pas, vérifiez votre pseudonyme et votre mot de passe";
}

}
 ?>

<html>

    <head>
        <meta charset="utf-8" />
        <title>Un espace membres</title>
        <link href="style.css" rel="stylesheet" />
    </head>

    <body>

<!-- Different message according to the url code -->
      <?php
          if (!empty($_GET['code'])) {
            if ($_GET['code'] == 1) {
              echo "<p>Il est l'heure de vous connecter pour la première fois</p>";
            }
            if ($_GET['code'] == 2) {
              echo "<p>Vous êtes déconnecté</p>";
            }
            if ($_GET['code'] == 3) {
              echo "<p>Votre session a expiré</p>";
            }
            else {
              echo "<p>Connectez-vous</p>";
            }
          }
       ?>

       <!-- Html form -->
              <form action="" method="post">

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
                  <label>Connexion automatique
                     <input type="checkbox" name="cookie">
                 </label>

                <p>
                  <input type="submit" value="Me connecter">
                </p>

              </form>

    </body>

  </html>
