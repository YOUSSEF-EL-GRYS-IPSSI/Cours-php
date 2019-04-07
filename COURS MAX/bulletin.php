<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lazy teacher</title>
        <style>
        	.red{
        		color: red;
        	}
        </style>

    </head>
    <body>

	<?php 
	
	/*
	Consignes : attribuer des notes aléatoires aux élèves, parceque corriger des rendus c'est long et chiant... Et pas payé...
	
	IMPORTANT : Le tableau $students ne DOIT PAS être modifié au cours de cet exercice ;-)
	
	1. à partir du tableau $students et à l'aide d'une boucle, rempir le tableau $studentsResults de la façon suivante :
	pour chaque ligne du tableau $studentsResults, le nom de l'élève sera la clé, à laquelle sera associée une valeur aléatoire comprise en 0 et 20 (qui sera la note de l'élève)
		
	2. à partir du tableau $studentsResults précédement remplit :
		- utiliser une boucle pour remplir un TABLEAU HTML de 2 colonnes (colonne nom de l'élève et colonne note de l'élève)
		- ajouter la chaîne " / 20" après chaque note
		- les cellules du tableau qui contiennent des notes négatives devront être affichées en rouge
	*/

	$students = [
		'APLOGAN John',
		'BEKKOUCHE Soraya',
		'BROU Nils',
		'BROU Willy',
		'CARBONNEL Antoine',
		'CHAILLOU Clément',
		'CLOAREC Samuel',
		'DAHROUJ Elie',
		'DAM Tony',
		'EDELMAN Yoel',
		'EL GRYS Youssef',
		'FTOUKI Amir',
		'GAUTHIER Tristan',
		'GOULLIER Julien',
		'GRILLON Yann',
		'HAMROUNI Charfeddine',
		'ISAC Ovidu Antonio',
		'JEZEQUEL Anthony',
		'KAHLOUN Sacha',
		'KANNOUNI Mehdi',
		'LEPRINCE Éric',
		'LIMA Steven',
		'ORSSET Maxandre',
		'REGNIER Thomas',
		'ROUSSEAU Brian',
		'SAIKANA Espoir',
		'SAINT-MARTIN Malaurie',
		'SEYT Adilie'
	];

    foreach ($students as $key => $value) 
    {

        $studentsResults [$value] = rand(0, 20);
    }

    echo "<table>";

    foreach ($studentsResults as $key => $value)
    {
	    echo "<tr>";
	    echo "<td>".$key."</td>";

	    if ($value <=9) 
	    {
	    	echo "<td class='red'>".$value."/20". "</td>";
	    }
	    else
	    {
	        echo "<td>".$value."/20" ."</td>";
	    }
	    
	    echo "</tr>";	
    }

    
    echo "</table>";
   
   	

	?>
  </body>
</html>

   
        

 