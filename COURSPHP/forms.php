<?php 
//Formulaire


if(isset($_POST['prenom']) && isset($_POST['nom'])) {

  $prenom = htmlspecialchars($_POST['prenom']) ;
  $nom = htmlspecialchars($_POST['nom']) ;

//si que des caracteres Alphabetiques 
  echo 'Bonjour '.$nom.' '.$prenom.' !';

}

echo'<form method ="post"action="forms.php">
		<p>
          <table>
             <tr>
                <td>prenom</<td>
                <td><input type="text" name="prenom"/></td>
             </tr>
              <tr>
                <td>nom</<td>
                <td><input type="text" name="nom"/></td>
             </tr>

		  </table>
	 <button type="submi">Envoyer</button>
        <p>
  
     </form>';
