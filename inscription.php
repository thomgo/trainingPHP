<html>

    <head>
        <meta charset="utf-8" />
        <title>Un espace membres</title>
        <link href="style.css" rel="stylesheet" />
    </head>

    <body>

       <h1>Inscrivez-vous dans notre espace membres</h1>

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

       <div>
         <a href="connexion.php">Déja inscrit ? Me connecter avec mon compte</a>
       </div>

    </body>

  </html>
