<?php
	//récupération de la liste des catégories pour générer le menu
	$query = $db->prepare('SELECT  name ,id FROM category ');
	$query->execute();
	$categoriesList = $query->fetchAll();
?>

<nav class="col-3 py-2 categories-nav">
  <?php
     IF(ISSET($_SESSION['email'])){
							
							$LOGIN=$_SESSION['email'];
							$query="SELECT   * FROM user where  email=:email  ";
						 
							$Stmt=$db->prepare($query);
							$Stmt->bindParam(':email',$LOGIN,PDO::PARAM_STR);
							$Stmt->execute();
			
							foreach($Stmt as $Afficher)
								{
									$admin=$Afficher['is_admin'];
					             echo  " <h1 style='text-align:center'> Salut ".$Nom=$Afficher['firstname']."</h1>";
								 
								}
			 }
						
						?>	
	<?php IF(ISSET($_SESSION['email'])){} else{ 	?>	
	 <a class="d-block btn btn-primary mb-4 mt-2" href="login-register.php">Connexion / inscription</a>
	 <?php } ?>
	 
	 <?php IF(ISSET($_SESSION['email']) && $admin==1){ 	?>
    <a class="d-block btn btn-warning mb-4 mt-2" href="admin/index.php">Administration</a>
	  <?php } ?>
	
	<?php IF(ISSET($_SESSION['email'])){ ?>
    <a class="d-block btn btn-danger mb-4 mt-2" href="disconnections.php">Déconnexion</a>
	
        <a class="d-block btn btn-warning mb-4 mt-2" href="#">Profile</a>
	<?php } ?>
	<b>Catégories :</b>
	<ul>
		<li><a href="article_list.php">Tous les articles</a></li>
		<!-- liste des catégories -->
		<?php foreach($categoriesList as $key => $category): ?>
		<li><a href="article_list.php?category_id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></li>
		<?php endforeach; ?>
	</ul>
</nav>
