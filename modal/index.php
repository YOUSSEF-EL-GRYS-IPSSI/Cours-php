<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="modal.css">
    <title>Document</title>
</head>
<body>
<button id="modal-btn" class="button">cliquez moi</button>
 <?php 
                
				IF(ISSET($_POST['valider'])){

            			
				 IF(!empty($_POST['prenom'] and  $_POST['mail'] and $_POST['mdp']) )
				 {
					include("connection_bdd.php");//connexion de la base de données
				    $PDO = Connection_BDD();
					
					$prenom=htmlspecialchars(addslashes($_POST['prenom']));
					$mail=htmlspecialchars(addslashes($_POST['mail']));
					$mdp=$_POST['mdp'];
					
					$Stmt=$PDO->exec("SET NAME UTF8");
					
					$REQUETE="INSERT INTO users (pseudo,email,password) VALUES (:pseudo,:email,:password)";
					$Stmt=$PDO->prepare($REQUETE);
					$Stmt->bindParam(':pseudo',$prenom,PDO::PARAM_STR);
					$Stmt->bindParam(':email',$mail,PDO::PARAM_STR);
					$Stmt->bindParam(':password',$mdp,PDO::PARAM_STR);								
					$Stmt->execute() or die(Print_r($PDO->errorInfo()));
					
					$Count=$Stmt->rowCount();
					IF($Count >0){
						?>
					        <script>
                                                                   
									alert(" Enregistrement reussi !");
                                                    
                              </script>
					  <?php
				          echo "<strong style='color:gréen'>Enregistrement reussi !!</strong>";										 
				
						}
							 ELSE{ ?>
													
													        <script>
                                                                   
																	alert("Désolé , enregistrement non reussi , Veuillez réessayer !");
                                                    
                                                                  </script>
													<?php
								   
									                  echo "<strong style='color:gréen'> Désolé , enregistrement non reussi , Veuillez réessayer ! </strong>";	

									
								                      }	 ?>
													 <?php
															
							$Stmt->closeCursor();
					
				 }
				 }
			   
		   ?>

<div id="my-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>FORMULAIRE</h2>
        </div>
        <div class="modal-body">
            <p>veuillez nous conctactez</p>
            <form method="POST" action="index.php">
                <label for="prenom">Entrés votre prenom :</label><br>
                <input type="text" name="prenom" id="prenom" maxlength="5"><br>
                <span id="prenom_manquant"></span>
                <label for="mail">Entrés votre mail:</label><br>
                <input type="email" name="mail" id="mail" maxlength="20"><br>
                <label for="password">Entrés votre mot de passe:</label><br>
                <input type="password" name="mdp" id="password" maxlength="20"><br>
                <input type="submit"   value="valider"  name="valider" id="bouton_envoie">
                 
			
			</form>
			
			

        </div>
        <div class="modal-footer">
            <h3>Mot de passe oublier ?</h3>
        </div>
    </div>
</div>
<script>


    const modal = document.querySelector('#my-modal')
    const modalBtn = document.querySelector('#modal-btn')
    const closeBtn = document.querySelector('.close')


    modalBtn.addEventListener('click', openModal)

    closeBtn.addEventListener('click', closeModal)
    window.addEventListener('click', outsideClick)

    function openModal() {
        modal.style.display = 'block'
    }


    function closeModal() {
        modal.style.display = 'none';
    }


    function outsideClick(e) {
        if (e.target == modal) {
            modal.style.display = 'none';
        }
    }



</script>

</body>
</html>