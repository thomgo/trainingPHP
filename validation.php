<?php

// Check if all the fields are filled in (file is optionnal). If not error message.
if(empty($_POST['name']) || empty($_POST['firstname']) || empty($_POST['age']) || empty($_POST['city']) || empty($_POST['gender']) || !isset($_POST['hobbies'])) {
     header('Location: formulaire.php?type=error&code=1');
}

else {

// Store the data in variables with protection
  $name = htmlspecialchars($_POST['name']);
  $firstname = htmlspecialchars($_POST['firstname']);
  $age = (int)$_POST['age'];
  $sexe = htmlspecialchars($_POST['gender']);
  $ville = htmlspecialchars($_POST['city']);
  $hobbies = htmlspecialchars($_POST['hobbies']);

// Action à réaliser avec les données (stockage fichier ou base de donnéelse)
// action non précisée dans l'énnoncé

// Test there is file submitted
  if ($_FILES['file']['error']>0) {
    header('Location: formulaire.php?type=success&code=1');
  }

// If there is a file test for max weight and extension
  else {
      if($_FILES['file']['size'] <= 1000000) {

        $fichier = pathinfo($_FILES['file']['name']);
        $extension = $fichier['extension'];
        $extensionOk = array('jpeg', 'jpg', 'gif', 'png', 'pdf', 'doc');

           if (in_array($extension, $extensionOk)) {
             move_uploaded_file($_FILES['file']['tmp_name'], 'files/' . basename($_FILES['file']['name']));
             header('Location: formulaire.php?type=success&code=2');
           }
          //  Redirection for bad extension
           else {
           header('Location: formulaire.php?type=error&code=3');
           }
      }
      // Redirection for over weight
      else {
        header('Location: formulaire.php?type=error&code=2');
      }
    }
}


 ?>
