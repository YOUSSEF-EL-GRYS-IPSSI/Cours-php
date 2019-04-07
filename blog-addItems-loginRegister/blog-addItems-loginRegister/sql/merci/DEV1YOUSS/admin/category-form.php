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

    <title>Administration des catégories - Mon premier blog !</title>
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
                <!-- Si $category existe, on affiche "Modifier" SINON on affiche "Ajouter" -->
                <h4>Ajouter une catégorie</h4>
            </header>


            <!-- Si $category existe, chaque champ du formulaire sera pré-remplit avec les informations de la catégorie -->

            <form action="category-form.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Nom :</label>
                    <input class="form-control"  type="text" placeholder="Nom" name="name" id="name"  required />
                </div>
                <div class="form-group">
                    <label for="description">Description : </label>
                    <input class="form-control"  type="text" placeholder="Description" name="description" id="description"  required />
                </div>

                <div class="form-group">
                    <label for="image">Image :</label>
                    <input class="form-control" type="file" name="image" id="image" />
                </div>

                <div class="text-right">
                    <!-- Si $category existe, on affiche un lien de mise à jour -->
                    <input class="btn btn-success" type="submit" name="save" value="Enregistrer" />
                </div>

                <!-- Si $category existe, on ajoute un champ caché contenant l'id de la catégorie à modifier pour la requête UPDATE -->
                   <?php 
                
				IF(ISSET($_POST['save'])){
                	
				 IF(!empty($_POST['name'] and  $_POST['description'] ))
				 {
					
				    $PDO = Connection_BDD();
					
					$name=htmlspecialchars(addslashes($_POST['name']));
					$description=htmlspecialchars(addslashes($_POST['description']));
					
					
					$Stmt=$PDO->exec("SET NAME UTF8");
					
					$REQUETE="INSERT INTO category (name,description) VALUES (:name,:description)";
					$Stmt=$PDO->prepare($REQUETE);
					$Stmt->bindParam(':name',$name,PDO::PARAM_STR);
					$Stmt->bindParam(':description',$description,PDO::PARAM_STR);				
					$Stmt->execute() or die(Print_r($PDO->errorInfo()));
					$Count=$Stmt->rowCount();
					IF($Count >0){
						
					         echo "
								
										<script>
														 $(document).ready(function() {
																window.location.href='category-list.php';
																											});
														alert('Enregistrement reussie !');
										</script>";
					
				          echo "<strong style='color:gréen'>Enregistrement reussi !!</strong>";										 
						}
							 ELSE{ 
													
													echo" <script>
														 $(document).ready(function() {
																window.location.href='category-list.php';
																											});
														alert('Désolé , enregistrement non reussi , Veuillez réessayer !');
										             </script>;
													        <script> alert('Désolé , enregistrement non reussi , Veuillez réessayer !');</script>";
							 }
															
							$Stmt->closeCursor();
					
				 }
				 }
			   
		   ?>
            </form>
        </section>
    </div>

</div>
</body>
</html>