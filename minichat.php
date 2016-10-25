<!doctype html>
<html class="no-js" lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Minichat</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>


<!-- Check if the treatment page returned an error code -->
<?php
if (!empty($_GET['code'])) {

  if ($_GET['code'] == 1) {
  echo '<p>Ce code est déja utilisé, veuillez en saisir un autre</p>';
  }

  else {
  echo '<p>Une erreur s\'est produite</p>';
  }

}
?>

<header class="jumbotron mt-0 mb-3 bg-primary text-white text-xs-center">
  <h1>Le Minichat</h1>
  <h2>Un exercice de développement php procédural réalisé à Simplon Roubaix</h2>
</header>

<!-- Basic html form with messahe and pseudo -->

<div class="container px-2 pb-3">
  <div class="col-sm-5">

    <form action="minichat_treatment.php" method="POST">

    <p>
      <label>Votre pseudo : <input class="form-control" type="text" name="pseudo"/></label>
    </p>
    <p>
      <label>Votre Message : <input class="form-control" type="text" name="message"/></label>
    </p>
    <p>
      <label>Votre code (vous permettra de supprimer votre message) : <input class="form-control" type="password" name="code"/></label>
    </p>

    <p><input class="btn btn-info" type="submit" value="Envoyer"></p>

    </form>

      <form action="minichat_treatment.php" method="POST" class="mt-2">
        <h4>Si vous souhaitez supprimer votre message</h4>
        <p><label>Votre code : <input class="form-control" type="password" name="supcode"/></label></p>
        <input class="btn btn-info" type="submit" value="Supprimer">
      </form>

      <form action="minichat_treatment.php" method="POST" class="mt-2">
        <h4>Si vous souhaitez modifier votre message</h4>
        <p><label>Votre nouveau message : <input class="form-control" type="text" name="newmessage"/></label></p>
        <p><label>Votre code : <input class="form-control" type="password" name="modifcode"/></label></p>
        <input class="btn btn-info" type="submit" value="Modifier">
      </form>
    </div>

    <div class="col-sm-7 pl-3">

      <div class="messages mb-3 px-1 py-1">
      <?php

      // Connection to the database
      require ('bd.php');

      // Select the messages in database
      $selection = $bdd->query('SELECT message, pseudo FROM minichat ORDER BY ID DESC LIMIT 10');

      // Display the messages from the array
      while ($chatdata = $selection->fetch()) {

        if (!empty($chatdata['pseudo'] && $chatdata['message'] )) {

      echo '<p>'. $chatdata['pseudo']. ' - '  . $chatdata['message'] . '</p>';
      }

      }

      $selection->closeCursor();

       ?>
       </div>

      <!-- Delete all the messages -->
       <form action="minichat_treatment.php" method="POST">

         <p>
           <input class="btn btn-danger" type="submit" name="delete" value="Supprimer les messages">
         </p>

       </form>
      </div>
      </div>

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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
 </body>
 </html>
