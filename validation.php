<?php

if(empty($_POST['name']) || empty($_POST['firstname']) || empty($_POST['age']) || empty($_POST['city']) || empty($_POST['gender']) || !isset($_POST['hobbies'])) {
     header('Location: formulaire.php?type=error&code=1');
}

else {

  $name = htmlspecialchars($_POST['name']);
  $firstname = htmlspecialchars($_POST['firstname']);
  $age = htmlspecialchars($_POST['age']);
  $sexe = htmlspecialchars($_POST['gender']);
  $ville = htmlspecialchars($_POST['city']);
  $hobbies = htmlspecialchars($_POST['hobbies']);

  if ($_FILES['file']['error']>0) {
    header('Location: formulaire.php?type=success&code=1');
  }
  else {
      if($_FILES['file']['size'] <= 1000000) {

        $fichier = pathinfo($_FILES['file']['name']);
        $extension = $fichier['extension'];
        $extensionOk = array('jpeg', 'jpg', 'gif', 'png', 'pdf', 'doc');

           if (in_array($extension, $extensionOk)) {
             move_uploaded_file($_FILES['file']['tmp_name'], 'files/' . basename($_FILES['file']['name']));
             header('Location: formulaire.php?type=success&code=2');
           }
           else {
           header('Location: formulaire.php?type=error&code=3');
           }
      }
      else {
        header('Location: formulaire.php?type=error&code=2');
      }
    }
}


 ?>
