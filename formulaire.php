<!--

~~~~General checking for url's information and definition
of the message to display~~~~~~~

 -->

<?php

// check for the error code and set the message
  if( isset($_GET['type']) && htmlspecialchars($_GET['type'] == 'error')) {
    // Make sure the code is an integer
    $_GET['code'] = (int) $_GET['code'];

    if ($_GET['code'] == 1) {
      $error_message = "Tous les champs doivents être remplis ou cochés ;-)";
    }
    elseif ($_GET['code'] == 2) {
      $error_message = "Votre fichier est trop lourd (max 1mo)";
    }
    elseif ($_GET['code'] == 3) {
      $error_message = "Votre fichier n'est pas au bon format (jpeg, jpg, gif, png, pdf, doc)";
    }
    else {
      $error_message = "Une erreur s'est produite merci de réessyer ultérieurement";
    }
  }

// check for the success code and set the message
  if( isset($_GET['type']) && htmlspecialchars($_GET['type'] == 'success')) {
    // Make sure the code is an integer
    $_GET['code'] = (int) $_GET['code'];

    if ($_GET['code'] == 1) {
      $success_message = "Vos données ont bien été envoyées, aucun fichier n'a été transmis";
    }
    else {
      $success_message = "Vos données et le fichier joint on bien été envoyés";
    }
  }

  ?>


<html>
<title>Exercices php</title>
<body>

<?php

// check is the error messgae is set
  if(!empty($error_message)) {
    echo "<p>" . $error_message . "</p>";
  }

// check is the success messgae is set
  if(!empty($success_message)) {
    echo "<p>" . $success_message . "</p>";
  }

 ?>

  <form method="post" action="validation.php" enctype="multipart/form-data">

    <label> Votre nom :
      <p><input type="text" name="name"></p>
    </label>

    <label> Votre Prénom :
      <p><input type="text" name="firstname"></p>
    </label>

    <label> Votre âge :
      <p><input type="number" name="age" value="0"></p>
    </label>

    <label> Votre sexe :
      <p>
        <input type="radio" name="gender" value="Homme">Homme <br>
        <input type="radio" name="gender" value="Femme">Femme <br>
      </p>
    </label>

    <label> Votre Ville :
      <p><input type="text" name="city" placeholder="La Madeleine"></p>
    </label>

    <label> Vos loisirs :
      <p>
        <input type="checkbox" name="hobbies" value="sport"> Sport<br>
        <input type="checkbox" name="hobbies" value="reading"> Lecture<br>
        <input type="checkbox" name="hobbies" value="food"> Nourriture<br>
        <input type="checkbox" name="hobbies" value="fishing"> Pêche<br>
      </p>
    </label>

    <label> Ajouter un fichier :
      <p><input type="file" name="file"></p>
    </label>

    <p><input type="submit" name="send" value="Envoyer"></p>

  </form>

</body>
</html>
