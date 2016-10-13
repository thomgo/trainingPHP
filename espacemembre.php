<?php
  session_start();
?>

<html>

    <head>
        <meta charset="utf-8" />
        <title>Un espace membres</title>
        <link href="style.css" rel="stylesheet" />
    </head>

    <body>

      <?php
        echo "Bonjour " . $_SESSION['pseudo'] . " bienvenue sur votre espace personnel";
       ?>

    </body>

  </html>
