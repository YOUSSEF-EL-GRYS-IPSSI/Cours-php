<!doctype html>
<html>
	<head>
		<title>Random numbers in table</title>
	</head>
	<body>
		<?php 

		// Trouver comment générer un nombre aléatoire en PHP
		// puis à l'aide d'une boucle : replir le tableau $randomNumbers avec 30 nombres aléatoires compris entre 0 et 100

		 $randomNumbers = [];
		 

		for ($nb = 1 ; $nb <= 30 ; $nb++ )
		 { 
		$randomNumbers[] = mt_rand(0,100); 
		
		} 
  
		
		
		//votre code ici
		
		echo '<pre>';
		print_r($randomNumbers);
		echo '</pre>';

		?>
	</body>
</html>

