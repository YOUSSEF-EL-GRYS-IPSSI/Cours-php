<?php require_once '../_tools.php'; 
 
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
            <header class="pb-4 d-flex justify-content-between">
                <h4>Liste des utilisateurs</h4>
                <a class="btn btn-primary" href="user-form.php">Ajouter un utilisateur</a>
            </header>


            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                      
					  $PDO=Connection_BDD();
					  $sql="SELECT  *  FROM  user   ORDER  BY  id  DESC";
					  $req=$PDO->prepare($sql);
					  $req->execute();
					  $donnees=$req->fetchAll();
					 foreach($donnees as $LISTE)
															{
													?>
                <tr>
                    <!-- htmlentities sert à écrire les balises html sans les interpréter -->
                    
					   <th><?php echo $LISTE['id'];?></th>
					   <th><?php echo $LISTE['firstname'];?></th>
                    <td><?php echo $LISTE['lastname'];?></td>
                    <td><?php echo $LISTE['email'];?></td>
               
                    <td><?php if($LISTE['is_admin']==1){
						   echo "Oui";}else  {
						   echo "Non";}
												 ?>
					</td>
                    <td>
                        <a href="user_form_update.php?user_id=<?php echo $LISTE['id']; ?>" class="btn btn-warning">Modifier</a>
                        <a onclick="return confirm('Voulez vous vraiment supprimer <?php echo $LISTE['firstname'];?> <?php echo $LISTE['lastname'];?>?')" href="delete_user.php?id=<?php echo $LISTE['id']; ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>

            <?php } ?>




                </tbody>
            </table>

        </section>

    </div>

</div>
</body>
</html>