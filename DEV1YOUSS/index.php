<?php require_once '_tools.php'; ?>
<?php
$query = $db->query('SELECT * FROM article ORDER BY date DESC LIMIT 3');
$homeArticles=$query->fetchAll();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Homepage - Mon premier blog !</title>
		<?php require 'partials/head_assets.php'; ?>
	</head>
	<body class="index-body">
		<div class="container-fluid">
		
		


			<?php require 'partials/header.php'; ?>
			<?php
										if (isset($_GET['message'])) {
											    $_GET['message'];
											IF ($_GET['message']=='loginerror')
											{
											echo '<p style="color:red;text-align:center;font-size:16px">Mot de passe ou adresse email incorrecte, veuillez réessayer !!! </p>';
									  	     } 
										} 

                                ?>

			<div class="row my-3 index-content">
			

				<?php require 'partials/nav.php'; ?>

				<main class="col-9">
					<section class="latest_articles">
						<header class="mb-4"><h1>Les 3 derniers articles :</h1></header>

						<!-- les trois derniers articles -->

						<?php foreach($homeArticles as $key => $article): ?>
						<article class="mb-4">
							<h2><?php echo $article['title']; ?></h2>
							<span class="article-date">
								<!-- affichage de la date de l'article selon le format %A %e %B %Y -->
								<?php echo strftime("%A %e %B %Y", strtotime($article['date'])); ?>
							</span>
							<div class="article-content">
								<?php echo $article['summary']; ?>
							</div>
							<a href="article.php?article_id=<?php echo $article['id']; ?>">> Lire l'article</a>
						</article>
						<?php endforeach; ?>

					</section>
					<div class="text-right">
						<a href="article_list.php">> Tous les articles</a>
					</div>
				</main>
			</div>

			<?php require 'partials/footer.php'; ?>

		</div>
	</body>
</html>
