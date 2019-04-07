<?php

require_once '../tools/common.php';

if(!isset($_SESSION['user']) OR $_SESSION['user']['is_admin'] == 0){
	header('location:../index.php');
	exit;
}

//séléctionner tous les articles pour affichage de la liste
$query = $db->query('SELECT * FROM article ORDER BY id DESC');
$articles = $query->fetchall();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Administration des articles - Mon premier blog !</title>
		<?php require 'partials/head_assets.php'; ?>
	</head>
	<body class="index-body">
		<div class="container-fluid">

			<?php require 'partials/header.php'; ?>

			<div class="row my-3 index-content">

				<?php require 'partials/nav.php'; ?>

				<section class="col-9">
					<header class="pb-4 d-flex justify-content-between">
						<h4>Liste des articles</h4>
						<a class="btn btn-primary" href="article-form.php">Ajouter un article</a>
					</header>

					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Titre</th>
								<th>Publié</th>
							</tr>
						</thead>
						<tbody>
							<?php if($articles): ?>
							<?php foreach($articles as $article): ?>
							<tr>
								<th><?= $article['id']; ?></th>
								<td><?= $article['title']; ?></td>
								<td>
									<?php echo ($article['is_published'] == 1) ? 'Oui' : 'Non'; ?>
								</td>
							</tr>
							<?php endforeach; ?>
							<?php else: ?>
								Aucun article enregistré.
							<?php endif; ?>
						</tbody>
					</table>
				</section>
			</div>
		</div>
	</body>
</html>
