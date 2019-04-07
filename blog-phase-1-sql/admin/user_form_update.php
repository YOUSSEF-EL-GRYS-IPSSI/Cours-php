<?php
FUNCTION NombreUsers() // la fonction qui permette de compter le nombre des utilisateurs eenregistré
											 {
												 include("connexion_bdd/connection_bdd.php");//connexion de la base de données
												$PDO=Connection_BDD(); ;//fonction de la connexion à la base de données
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
                <h4>Modifcation de l'utilisateur</h4>
            </header>


           
            <?php 
					 
                       $PDO=Connection_BDD();
                       $id=$_GET['user_id']; //recuperer des informations via l'identifiant avec la méthode GET
						$sql="SELECT  *  FROM  user where id='$id' ";
						$req=$PDO->prepare($sql);
						$req->execute();
						$INFOS=$req->fetchAll();
					    foreach($INFOS as $LISTE)
							{
													?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="firstname">Prénom :</label>
                    <input class="form-control"  type="hidden"  value="<?php echo $LISTE['id'];?>" name="id" id="id"  required />
                    <input class="form-control"  type="text"  value="<?php  echo $LISTE['firstname'];?>" placeholder="Prénom" name="firstname" id="firstname"  required />
                </div>
                <div class="form-group">
                    <label for="lastname">Nom de famille : </label>
                    <input class="form-control"  type="text" placeholder="Nom de famille" value="<?php  echo $LISTE['lastname']; ?>"  name="lastname" id="lastname"  required />
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input class="form-control"  type="email" placeholder="Email" name="email" value="<?php  echo $LISTE['email']; ?>" id="email"  required />
                </div>
				
				<div class="form-group">
                    <label for="email">Mot de passe :</label>
                    <input class="form-control"  type="password" placeholder="Mot de passe" name="password" value="<?php  echo $LISTE['password']; ?>" id="password"  required/>
                </div>
                
                <div class="form-group">
                    <label for="bio">Biographie :</label>
                    <textarea class="form-control" name="bio" id="bio" placeholder="Sa vie son oeuvre..."  required> <?php  echo $LISTE['biographie']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="is_admin"> Admin ?</label>
                    <select class="form-control" name="is_admin" id="is_admin"  required>
					      <?php if($LISTE['is_admin']=1){ ?>
						  <option value="1" >Oui</option>
                       <option value="0" >Non</option>
						  <?php } else{ ?>
						  <option value="0" >Non</option>
						  <option value="1" >Oui</option>
                      
						  <?php } ?>
                    </select>
                </div>

                <div class="text-right">
                    <!-- Si $user existe, on affiche un lien de mise à jour -->
                    <input class="btn btn-success" type="submit" name="Modifier" value="Modifier" />
                </div>
				
				<?php 		
                }				
				IF(ISSET($_POST['Modifier'])){
                	
				 IF(!empty($_POST['firstname'] and  $_POST['lastname'] and $_POST['email']  and $_POST['bio'] )) // vérifie les informations si c'est vide
				 {
					
				    $PDO = Connection_BDD();
					
				    $id=htmlspecialchars(addslashes($_POST['id']));
				    $firstname=htmlspecialchars(addslashes($_POST['firstname']));
					$lastname=htmlspecialchars(addslashes($_POST['lastname']));
					$email=htmlspecialchars(addslashes($_POST['email']));
					$password=htmlspecialchars(addslashes($_POST['password']));
					$bio=htmlspecialchars(addslashes($_POST['bio']));
					$is_admin=htmlspecialchars(addslashes($_POST['is_admin']));
					
					
					$Stmt=$PDO->exec("SET NAME UTF8");
					$REQUETE="UPDATE user  SET firstname='$firstname',lastname='$lastname',email='$email',password='$password',biographie='$bio',is_admin='$is_admin' WHERE id='$id' ";
					$Stmt=$PDO->prepare($REQUETE);
					$Stmt->execute() or die(Print_r($PDO->errorInfo()));
					$Count=$Stmt->rowCount();
					IF($Count >0){ // si enregistrement reussie
						
					         echo "
								
										<script>
														 $(document).ready(function() {
																window.location.href='user-list.php';
																											});
														alert('Modification reussie !! !');
										</script>";
					
				          echo "<strong style='color:gréen'>Modification reussie !!</strong>";										 
						}
							 ELSE{  // si enregistrement non reussie
													
													echo" <script>
														 $(document).ready(function() {
																window.location.href='user-list.php';
																											});
														alert('Désolé , modification non reussie , Veuillez réessayer');
										             </script>;
													        <script> alert('Désolé , modification non reussie , Veuillez réessayer !');</script>";
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