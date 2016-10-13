<html>

    <head>
        <meta charset="utf-8" />
        <title>Un espace membres</title>
        <link href="style.css" rel="stylesheet" />
    </head>

    <body>

       <h1>Inscrivez-vous dans notre espace membres</h1>

       <!-- Check if there is an error code in the url and display the right message -->
       <?php
       if (!empty($_GET['code'])) {

          if ($_GET['code'] == 1) {
            echo "Tous les champs sont obligatoires";
          }
          elseif ($_GET['code'] == 2) {
            echo "Attention vos mots de passe ne sont pas identiques !";
          }
          elseif ($_GET['code'] == 3) {
            echo "Cette adresse mail est invalide";
          }
          elseif ($_GET['code'] == 4) {
            echo "Ce pseudo est déjà utilisé, veuillez en choisir un autre !";
          }
          else {
            echo "Une erreur est survenue, veuillez réessayer";
          }
        }
        ?>

<!-- Html form -->
       <form action="enregistrement.php" method="post">

           <label>Votre pseudo
             <p>
               <input type="text" name="pseudo">
             </p>
           </label>
            <label>Mot de passe
             <p>
               <input type="password" name="mdp">
             </p>
           </label>
           <label>Confirmez votre mot de passe
            <p>
              <input type="password" name="mdpconfirm">
            </p>
          </label>
          <label>Votre email
           <p>
             <input type="email" name="mail">
           </p>
         </label>

         <input type="submit" name="name" value="M'inscrire">
       </form>

<!-- Link to get to the connexion page -->
       <div>
         <a href="connexion.php">Déja inscrit ? Me connecter avec mon compte</a>
       </div>

    </body>

  </html>
