<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Affichage de noombres aléatoires en couleur</title>
    </head>
    <body>
        <ul>
        <?php

        // 1ere boucle : générer un tableau 40 nombres aléatoires compris entre -10 et 10
        // 2eme boucle : Script qui, dans une liste HTML, affiche via une boucle avec les contraintes suivantes :
       // - Tous les nombres négatifs seront affichés en ROUGE
      // - Les nombres qui valent 0 seront affichés normalement
// - Pour les nombres positifs, deux cas de figure :
  // - Les nombres pairs seront affichés en BLEU
// - Les nombres impairs seront affichés en VERT`

         $randomNumbers = [];
         

        for ($nb = 0 ; $nb <= 40 ; $nb++ )
         { 
        $randomNumbers[] = mt_rand(-10,10); 

        foreach ($randomNumbers as $value) {
        if ($value <0) {
            echo '<li class="red">'.$value.'</li>';
            # code...
        }
        elseif ($value >0) {
         if ($value %2==0) {
            echo '<li class="blue">'.$value.'</li>';
             # code...
         }
         else{
            echo '<li class="green">'.$value.'</li>';
         }
         
        }
        } 

        echo '<pre>';
        print_r($randomNumbers);
        echo '</pre>';





        ?>
    </ul>
  </body>
</html>
