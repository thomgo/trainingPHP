<?php

if(empty($_POST['name']) || empty($_POST['firstname']) || empty($_POST['age']) || empty($_POST['city']) || !isset($_POST['hobbies'])) {
    header('Location: formulaire.php?type=error&code=1');
  }
  else {
    header('Location: formulaire.php?type=error&code=2');
  }

// else {
//   header('Location: formulaire.php?type=error&code=1');
// }

 ?>
