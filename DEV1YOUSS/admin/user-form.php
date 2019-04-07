<?php
FUNCTION NombreUsers() // la fonction qui permette de compter le nombre des utilisateurs eenregistré
											 {
												 include("connexion_bdd/connection_bdd.php");//connexion de la base de données
												$PDO=Connection_BDD();
												$query="select COUNT(id) AS nombre from user";
												$stmt=$PDO->prepare($query);
												$stmt->execute();
												return $stmt;
										       }
										       $nbres=NombreUsers();	
										              foreach($nbres AS $listes)
											{
											  $CountUser=$listes['nombre'];
											} 
											
FUNCTION Nombrecategory() // la fonction qui permette de compter le nombre des categories eenregistré
											 {
												
												$PDO=Connection_BDD();
												$query="select COUNT(id) AS nombre from category";
												$stmt=$PDO->prepare($query);
												$stmt->execute();
												return $stmt;
										       }
										       $nbres=Nombrecategory();	
										              foreach($nbres AS $listes)
											{
											  $CountCatgory=$listes['nombre'];
											} 
							
FUNCTION NombreArticles() // la fonction qui permette de compter le nombre des categories eenregistré
											 {
												
												$PDO=Connection_BDD();
												$query="select COUNT(id) AS nombre from article";
												$stmt=$PDO->prepare($query);
												$stmt->execute();
												return $stmt;
										       }
										       $nbres=NombreArticles();	
										              foreach($nbres AS $listes)
											{
											  $CountArticles=$listes['nombre']; 
											} 
?>

<!DOCTYPE html>
<html>
<head>

    <title>Administration des utilisateurs - Mon premier blog !</title>

    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>

</head>
<body class="index-body">
<div class="container-fluid">

    <header class="row mb-3 main-header">
        <div class="col py-4 text-center">
            <a href="index.php"><b>Administration - Mon premier blog !</b></a>
        </div>
    </header>
    <div class="row my-3 index-content">

        ﻿<nav class="col-3 py-2 categories-nav">
            <a class="d-block btn btn-warning mb-4 mt-2" href="index.php">Site</a>
            <ul>
                <li><a href="user-list.php">Gestion des utilisateurs (<?php echo $CountUser; ?>)</a></li>
                <li><a href="category-list.php">Gestion des catégories (<?php echo $CountCatgory; ?>)</a></li>
                <li><a href="article-list.php">Gestion des articles (<?php echo $CountArticles; ?>)   </a></li>
            </ul>
        </nav>

        <section class="col-9">
            <header class="pb-3">
                <!-- Si $user existe, on affiche "Modifier" SINON on affiche "Ajouter" -->
                <h4>Ajouter un utilisateur</h4>
            </header>


            <!-- Si $user existe, chaque champ du formulaire sera pré-remplit avec les informations de l'utilisateur -->

            <form action="user-form.php" method="post">
                <div class="form-group">
                    <label for="firstname">Prénom :</label>
                    <input class="form-control"  type="text"  placeholder="Prénom" name="firstname" id="firstname"  required />
                </div>
                <div class="form-group">
                    <label for="lastname">Nom de famille : </label>
                    <input class="form-control"  type="text"   requiredplaceholder="Nom de famille" name="lastname" id="lastname"  required />
                </div>
                <div class="form-group">
                    <label for="email">Email :</label> 
                    <input class="form-control"  type="email" placeholder="Email" name="email" id="email"  required />
                </div>
                <div class="form-group">
                    <label for="password">Password : </label>
                    <input class="form-control" type="password" placeholder="Mot de passe" name="password" id="password"  required />
                </div>
                <div class="form-group">
                    <label for="bio">Biographie :</label>
                    <textarea class="form-control" name="bio" id="bio" placeholder="Sa vie son oeuvre..."  required ></textarea>
                </div>
                <div class="form-group">
                    <label for="is_admin"> Admin ?</label>
                    <select class="form-control" name="is_admin" id="is_admin"  required>
                        <option value="0" >Non</option>
                        <option value="1" >Oui</option>
                    </select>
                </div>

                <div class="text-right">
                    <!-- Si $user existe, on affiche un lien de mise à jour -->
                    <input class="btn btn-success" type="submit" name="save" value="Enregistrer" />
                </div>
				
				<?php 
                
				IF(ISSET($_POST['save'])){
                	
				 IF(!empty($_POST['firstname'] and  $_POST['lastname'] and $_POST['email'] and $_POST['password'] and $_POST['bio'] ))
				 {
					
				    $PDO = Connection_BDD(); //appel de la fonction de la connexion à la base de donnéee
					
					
					 $firstname=htmlspecialchars(addslashes($_POST['firstname']));
					$lastname=htmlspecialchars(addslashes($_POST['lastname']));
					$email=htmlspecialchars(addslashes($_POST['email']));
					$password=htmlspecialchars(addslashes($_POST['password']));
					$bio=htmlspecialchars(addslashes($_POST['bio']));
					$is_admin=htmlspecialchars(addslashes($_POST['is_admin']));
					
					
					$Stmt=$PDO->exec("SET NAME UTF8");
					
					$REQUETE="INSERT INTO user (firstname,lastname,email,password,biographie,is_admin) VALUES (:firstname,:lastname,:email,:password,:biographie,:is_admin)";
					$Stmt=$PDO->prepare($REQUETE);
					$Stmt->bindParam(':firstname',$firstname,PDO::PARAM_STR);
					$Stmt->bindParam(':lastname',$lastname,PDO::PARAM_STR);
					$Stmt->bindParam(':email',$email,PDO::PARAM_STR);
					$Stmt->bindParam(':password',$password,PDO::PARAM_STR);
					$Stmt->bindParam(':biographie',$bio,PDO::PARAM_STR);
					$Stmt->bindParam(':is_admin',$is_admin,PDO::PARAM_STR);								
					$Stmt->execute() or die(Print_r($PDO->errorInfo()));
					
					$Count=$Stmt->rowCount();
					IF($Count >0){
						
					         echo "
								
										<script>
														 $(document).ready(function() {
																window.location.href='user-list.php';
																											});
														alert('Enregistrement reussie !');
										</script>";
					
				          echo "<strong style='color:gréen'>Enregistrement reussi !!</strong>";										 
						}
							 ELSE{ 
													
													echo" <script>
														 $(document).ready(function() {
																window.location.href='user-list.php';
																											});
														alert('Désolé , enregistrement non reussi , Veuillez réessayer !');
										             </script>;
													        <script> alert('Désolé , enregistrement non reussi , Veuillez réessayer !');</script>";
							 }
															
							$Stmt->closeCursor();
					
				 }
				 }
			   
		   ?>
				  
				  

                <!-- Si $user existe, on ajoute un champ caché contenant l'id de l'utilisateur à modifier pour la requête UPDATE -->

            </form>
        </section>
    </div>

</div>
</body>
</html>