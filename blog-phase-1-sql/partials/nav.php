<?php
	//récupération de la liste des catégories pour générer le menu
	$query = $db->prepare('SELECT  name ,id FROM category ');
	$query->execute();
	$categoriesList = $query->fetchAll();
?>

<nav class="col-3 py-2 categories-nav">
    <a class="d-block btn btn-primary mb-4 mt-2" href="login-register.php">Connexion / inscription</a>
    <a class="d-block btn btn-warning mb-4 mt-2" href="admin/index.php">Administration</a>
	<b>Catégories :</b>
	<ul>
		<li><a href="article_list.php">Tous les articles</a></li>
		<!-- liste des catégories -->
		<?php foreach($categoriesList as $key => $category): ?>
		<li><a href="article_list.php?category_id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></li>
		<?php endforeach; ?>
	</ul>
</nav>
