<!doctype html>
<html>
	<head>
		<title>Target specific elements in a loop</title>
	</head>
	<style>

	      #red{
	      	color: red;

	      }
	      #blod{
	      	font-weight: bold;
	      }

		


		}
	</style>
	<body>
		<ul>
		<?php 

		// à partir d'un tableau d'informations $characterInformations donné
		// à l'aide d'une boucle afficher l'ensemble des infos du personnage dans une liste ul/li
		// Le prénom du personnage doit être affiché en ROUGE
		// L'age du personnage doit être affiché en GRAS

		$userInformations = [


			 'firstName : ' => "<span id='red'> Cloud </span>",
			 'lastName : ' => 'Strife', 
			 'age : ' => "<span id='blod'> 25</span>"

		];
	

	 
	 foreach ($userInformations as $key => $value  )
 
	      {
	     echo "<li>".$value."</li>"; 
	    
        }


		
		 

		?>
		</ul>
	</body>
</html>
