<?php require_once('_datas.php'); ?>

<!DOCTYPE html>
<html>
 <head>

	<title>[dynamique - "tous les articles" OU titre de la catégorie affichée] - Mon premier blog !</title>
   
   <?php require('partials/head_assets.php'); ?>
   
 </head>
 <body class="article-list-body">
	<div class="container-fluid">
		
		<?php require('partials/header.php'); ?>
		
		<div class="row my-3 article-list-content">
		
			<?php require('partials/nav.php'); ?>
			
			<main class="col-9">
				<section class="all_aricles">
					<header>
						<h1>[dynamique - "tous les articles" OU titre de la catégorie affichée]</h1>
					</header>
					
					<!-- [dynamique - affichage de tous les articles OU les articles liés à la catégorie affichée] -->
				</section>
			</main>
			
		</div>
		
		<?php require('partials/footer.php'); ?>
		
	</div>
 </body>
</html>