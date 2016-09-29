<?php

  if($_GET['type'] == 'error') {
    if ($_GET['code'] == 1) {
      $error_message = "Tous les champs doivents être remplis";
    }
  }

  ?>


<html>
<title>Exercices php</title>
<body>

<?php

  if(!empty($error_message)) {
    echo "<p>" . $error_message . "</p>";
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

    <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />

    <label> Ajouter un fichier :
      <p><input type="file" name="file"></p>
    </label>

    <p><input type="submit" name="name" value="Envoyer"></p>

  </form>

</body>
</html>
