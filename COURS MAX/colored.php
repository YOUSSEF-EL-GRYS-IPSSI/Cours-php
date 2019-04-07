<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Affichage de nombres aléatoires en couleur</title>
    </head>
    <body>
        <ul>
        <?php

        // 1ere boucle : générer un tableau 40 nombres aléatoires compris entre -10 et 10
        // 2eme boucle : Script qui, dans une liste HTML, affiche les nombres via une boucle avec les contraintes suivantes :
        // - Tous les nombres négatifs seront affichés en ROUGE
        // - Les nombres qui valent 0 seront affichés normalement
        // - Pour les nombres positifs, deux cas de figure :
        //   - Les nombres pairs seront affichés en BLEU
        //   - Les nombres impairs seront affichés en VERT

        $randomNumbers = [];

        for($n = 0 ; $n < 40 ; $n ++ ){
    			$randomNumbers[] = mt_rand(-10, 10);
    		}

    		echo '<pre>';
    		print_r($randomNumbers);
    		echo '</pre>';

        echo '<ul>';

		//solution 1 :
		 foreach($randomNumbers as $number){
          if($number < 0 ){
            echo '<li style="color:red;">'. $number .'</li>';
          }
          elseif($number > 0){
            if($number%2 == 0){
			  echo '<li style="color:blue;">'. $number .'</li>';
			}
			else{
			  echo '<li style="color:green;">'. $number .'</li>';
			}
          }
          else{
            echo '<li>'. $number .'</li>';
          }
        }
		


        ?>
    </ul>
  </body>
</html>
