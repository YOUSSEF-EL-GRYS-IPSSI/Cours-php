<?php
//Verifie si image bien reçu
if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
    $error = 1;

    // TAILLE
    if($_FILES['image']['size'] <= 3000000)

        // EXTENSION
        $informationImage = pathinfo($_FILES['image']['name']);
    $extensionImage = $informationImage['extension'];
    $extensionArray = array('jpg','png', 'jpeg','gif');

    if(in_array($extensionImage, $extensionArray))
    {

        $adress = 'pictures/'.time().rand().'.'.$extensionImage;

        move_uploaded_file($_FILES['image']['tmp_name'], $adress);

        $error = 0;
    }
}


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

    <title>Administration des articles - Mon premier blog !</title>

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
                <!-- Si $article existe, on affiche "Modifier" SINON on affiche "Ajouter" -->
                <h4>Ajouter un article</h4>
            </header>

            <ul class="nav nav-tabs justify-content-center nav-fill" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#infos" role="tab">Infos</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane container-fluid active" id="infos" role="tabpanel">


                    <!-- Si $article existe, chaque champ du formulaire sera pré-remplit avec les informations de l'article -->
                    <form action="article-form.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="title">Titre :</label>
                            <input class="form-control"  type="text" placeholder="Titre" name="title" id="title"  required/>
                        </div>
                        <div class="form-group">
                            <label for="summary">Résumé :</label>
                            <input class="form-control"  type="text" placeholder="Résumé" name="summary" id="summary"   required/>
                        </div>
                        <div class="form-group">
                            <label for="content">Contenu :</label>
                            <textarea class="form-control" name="content" id="content" placeholder="Contenu"  required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="image">Image :</label>
                            <input class="form-control" type="file" name="image" id="image" />
                        </div>

                        <div class="form-group">
                            <label for="categories"> Catégorie </label>
                            <select class="form-control" name="categories" id="categories"  required>

                                <option value="">Sélectionner la catégorie </option>
                                                   <?php 
													$PDO=Connection_BDD();
													$requete=$PDO->query("SELECT  *  FROM  category");
													WHILE($LISTE=$requete->fetch())
													{
													  ?>
															<option value="<?php echo $LISTE['id'];?>"><?php echo $LISTE['name'];?>  </option>
														<?php 
													} 
													?>
                                

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="is_published"> Publié ?</label>
                            <select class="form-control" name="is_published" id="is_published"  required>
                                <option value="0" >Non</option>
                                <option value="1" >Oui</option>
                            </select>
                        </div>

                        <div class="text-right">
                            <!-- Si $article existe, on affiche un lien de mise à jour -->
                            <input class="btn btn-success" type="submit" name="save" value="Enregistrer" />
                        </div>

                       <?php 
                
				IF(ISSET($_POST['save'])){
                	
				 IF(!empty($_POST['title'] and  $_POST['summary'] and $_POST['content'] ))
				 {
					
				    $PDO = Connection_BDD();
					
					$title=htmlspecialchars(addslashes($_POST['title']));
					$summary=htmlspecialchars(addslashes($_POST['summary']));
					$content=htmlspecialchars(addslashes($_POST['content']));
					$categories=htmlspecialchars(addslashes($_POST['categories']));
					$is_published=htmlspecialchars(addslashes($_POST['is_published']));
					$date=date('Y-m-d');
					
					
					$Stmt=$PDO->exec("SET NAME UTF8");
					
					$REQUETE="INSERT INTO article (category_id,title,date,summary,content,is_published) VALUES (:category_id,:title,:date,:summary,:content,:is_published)";
					$Stmt=$PDO->prepare($REQUETE);
					$Stmt->bindParam(':category_id',$categories,PDO::PARAM_STR);
					$Stmt->bindParam(':title',$title,PDO::PARAM_STR);
					$Stmt->bindParam(':date',$date,PDO::PARAM_STR);
					$Stmt->bindParam(':summary',$summary,PDO::PARAM_STR);
					$Stmt->bindParam(':content',$content,PDO::PARAM_STR);
					$Stmt->bindParam(':is_published',$is_published,PDO::PARAM_STR);								
					$Stmt->execute() or die(Print_r($PDO->errorInfo()));
					
					$Count=$Stmt->rowCount();
					IF($Count >0){
						
					         echo "
								
										<script>
														 $(document).ready(function() {
																window.location.href='article-list.php';
																											});
														alert('Enregistrement reussie !');
										</script>";
					
				          echo "<strong style='color:gréen'>Enregistrement reussi !!</strong>";										 
						}
							 ELSE{ 
													
													echo" <script>
														 $(document).ready(function() {
																window.location.href='article-list.php';
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
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>