<?php

require_once '../tools/common.php';

if(!isset($_SESSION['user']) OR $_SESSION['user']['is_admin'] == 0){
	header('location:../index.php');
	exit;
}

//séléctionner tous les utilisateurs pour affichage de la liste
$query = $db->query('SELECT * FROM user ORDER BY id DESC');
$users = $query->fetchall();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Administration des utilisateurs - Mon premier blog !</title>
		<?php require 'partials/head_assets.php'; ?>
	</head>
	<body class="index-body">
		<div class="container-fluid">

			<?php require 'partials/header.php'; ?>

			<div class="row my-3 index-content">

				<?php require 'partials/nav.php'; ?>

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
							</tr>
						</thead>
						<tbody>

							<?php if($users): ?>
							<?php foreach($users as $user): ?>

							<tr>
								<th><?= $user['id']; ?></th>
								<td><?= $user['firstname']; ?></td>
								<td><?= $user['lastname']; ?></td>
								<td><?= $user['email']; ?></td>
								<td><?= $user['is_admin']; ?></td>
							</tr>

							<?php endforeach; ?>
							<?php else: ?>
								Aucun utilisateur enregistré.
							<?php endif; ?>

						</tbody>
					</table>
				</section>
			</div>
		</div>
	</body>
</html>
