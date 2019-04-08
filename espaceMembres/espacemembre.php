<?php
  session_start();

// Code 2 mean you acces the page thanks to cookies after a while,
//so start new session variables based on cookie variables
  if (isset($_GET['code'])) {
    if ($_GET['code']== 2) {
      $_SESSION['pseudo'] = $_COOKIE['pseudo'];
      $_SESSION['mdp'] = $_COOKIE['mdp'];
    }
  }

// Set a session time activity (source stackoverflow)
  if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 60)) {
   session_unset();
   session_destroy();
}
$_SESSION['LAST_ACTIVITY'] = time();

// If the session and therefore the variables are over you are redirected to the connexion page
if (empty($_SESSION['pseudo']) && empty($_SESSION['mdp'])) {
  header("Location: connexion.php?code=3");
}

// If code 1 the user has clicked on deconnexion link below
//Destroy session and cookies and go to connexion page
if (!empty($_GET['code'])) {
  if ($_GET['code'] == 1) {
    session_destroy();

    setcookie('pseudo', "");
    setcookie('mdp', "");

  header("Location: connexion.php?code=2");
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
        echo "<p>Bonjour " . $_SESSION['pseudo'] . " bienvenue sur votre espace personnel.</p>";
       ?>

<!-- Code 1 see code line 25 -->
       <a href="espacemembre.php?code=1">Me déconnecter</a>

    </body>

  </html>
