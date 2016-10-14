<?php
  session_start();

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
        echo "<p>Bonjour " . $_SESSION['pseudo'] . " bienvenue sur votre espace personnel</p>";
       ?>

       <a href="espacemembre.php?code=1">Me déconnecter</a>

    </body>

  </html>
