<!-- CONNECT / OPERATIONS (LIRE / ECRIRE MODIFIER / SUPPRIMER)

mysql_ =>mySQL, vielle, =/=
msqli_ =>mySQL, ameliorée,
PDO => trés securisée, mySQL, Oracle, PostgreSQL-->


<?php
/// HOTE : localhost - SQl.monserveur.com
/// Nom de la base : formation_user
/// Login : Root

/// CONNEXION
  try{
      $bdd = new PDO('mysql:host=localhost;dbname=formation_user;charset=utf8','root','');

  } catch (Exception $e){
      die('Error :'.$e->getMessage());
  }


// AJOUTE UN NOUVEL UTILISATEUR

if (isset($_POST['prenom']) && isset($_POST['nom'])
    && isset($_POST['serie'])){

    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $serie = $_POST['serie'];

    $requete = $bdd->prepare('INSERT INTO users(prenom, nom, serie_preferee)VALUES(?, ? , ?)') ;
    $requete->execute(array($prenom,$nom,$serie));


}



      // AJOUTER UN UTILISATEUR
    /*  $requete = $bdd->exec('INSERT INTO users(prenom, nom, serie_preferee)VALUE ("amal","chaoui","Supergirl")')
      or die(print_r($bdd->errorInfo()));*/

        // MODIFIER UN OU PLUSIEUR UTILISATUER
       /*$requete = $bdd->exec('UPDATE users SET serie_preferee ="lucifer" where prenom = "max"');*/



    // SUPPRIMER UN UTLISATEUR

   /* $requete = $bdd->exec('DELETE FROM users WHERE prenom ="mark" ');*/


    // AJOUTER UN METIER
    /*$requete = $bdd->exec('INSERT INTO jobs(id_user, metier)
              VALUES(3, "Financier")');*/


   // JOUINTURES INTERNE
   //WHERE: moins en moins choisi, moins clair
   // JOIN : plus en plus choisi, plus clair



    // LIRE DES INFORMATION
  /* $requete = $bdd->query('SELECT prenom, nom, serie_preferee, metier
                              FROM users, jobs
                                WHERE users.id = jobs.id_user   ');*/
//   '" OR 1=1#'
//   $prenom = 'youssef';
//   $nom = 'chaoui';

   // AFFICHE LES INFORMATIONS
   $requete = $bdd->query('SELECT prenom, nom,
                          serie_preferee FROM users');

 //$requete->execute(array($prenom,$nom));


  echo '<table border >
                 <tr>
                     <th>Pseudo</th>
                     <th>Nom</th>
                     <th>Serie Préférée</th>
                   
                     
                     
                </tr>';



  while ($donner = $requete->fetch()){

      echo '<tr>
               <td>'.$donner["prenom"].'</td>
               <td>'.$donner["nom"].'</td>
               <td>'.$donner["serie_preferee"].'</td>
           
              
           </tr>';

      // MOT DE PASSE CRYPTE
      // GAIN (584F)
      // MOT DE DE PASSE CRYPTE + GRAIN


  }
  // je ferme ma requete!!!
  $requete->closeCursor();
  echo '</table>';


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Base de donné</title>
</head>
<body>
    <h1>Ajouter un utilisateur</h1>

    <form method="post" action="bsd.php">

        <table>
            <tr>
                <td>Prenom</td>
                <td><input type="text" name="prenom"></td>
            </tr>
            <tr>
                <td>Nom</td>
                <td><input type="text" name="nom"></td>
            </tr>
            <tr>
                <td>Série préféré</td>
                <td><input type="text" name="serie"></td>
            </tr>

        </table>
        <button type="submit">Ajouter</button>
    </form>


</body>
</html>