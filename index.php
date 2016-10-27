<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <?php
        // Connexion to the database
            require ('db.php');
            $request = $bdd->query("SELECT * FROM list");

            while ($currentlist = $request->fetch()) {
              ?>
              <div class="major">
                <h2><?php echo "<p>" . $currentlist['nom'] . "</p>"; ?></h2>
                <?php
                $requesttask = $bdd->query('SELECT * FROM taches WHERE listid ="'.$currentlist['id'].'"');
                  while ($tasklist = $requesttask->fetch()) {
                  echo "<p>" . $tasklist['nom'] . " <a href='#' class='afaire'> A faire </a> <a href='#' class='fait hide'> Fait </a></p>";
                  }
                 ?>
                <form action="traitement.php" method="post">
                  <input type="text" name="taches" required>
                  <input type="hidden" name="listid" value='<?php echo $currentlist['id'];?>'>
                  <p>
                    <input type="submit" value="Ajouter une tache">
                  </p>
                </form>
              </div>

          <?php
            }
         ?>

         <form action="traitement.php" method="post">
           <input type="text" name="list" required>
           <p>
             <input type="submit" value="Ajouter la liste">
           </p>
         </form>

        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
