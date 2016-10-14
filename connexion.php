<?php
  session_start();

  if (isset($_SESSION['pseudo']) && isset($_SESSION['mdp'])) {
    header("Location: espacemembre.php");
    exit;
  }

  if (isset($_COOKIE['pseudo']) && isset($_COOKIE['mdp']) && $_GET['code'] != 3) {
    header("Location: espacemembre.php?code=2");
    exit;
  }

// Connexion to the database
  require ('db.php');

  if (isset($_POST['pseudo']) && isset($_POST['mdp'])) {

  $pseudo = htmlspecialchars($_POST['pseudo']);
  $mdp = sha1(htmlspecialchars($_POST['mdp']));

  $request = $bdd->prepare('SELECT * FROM membres WHERE pseudo= :pseudo AND mdp= :mdp');
  $request->execute([
    'pseudo'=>$pseudo,
    'mdp'=>$mdp
  ]);

$user = $request->fetch();

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
