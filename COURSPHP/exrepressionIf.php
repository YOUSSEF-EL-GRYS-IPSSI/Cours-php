<?php 
// CONDITIONS : IF
// > est superieur
//< est inferieur
// <= est inferieur ou egal 
// >= est superieur ou egal
// != est different 

$note = 20;

switch ($note) 
{
	 case 0:
	     echo "vous etes vrament nul.";
	     break ;
	 case 1:
	     echo "vous etes (vraiment) nul";
	     break ;
    default:
      echo "vous ete magnifiquement nul !";


}     



/*s
 	 $age = 18;
  
  if ($age >18) {
  	echo "vous ete majeur.";

  } else if ($age == 18) {

   echo "vous ete enfin majeur.";
  }

  else  {


  	echo "vous ete mineur";
  }
  */
  // condition multiple 
/*
  $pseudo = "tintin" ;
  $mdp = "lune";



  if ($pseudo == "tintin" AND $mdp == "lune"){


  	echo "mot de passe valide.";
}
else {
	echo "mot de passe invalide";
}
*/


  // LES CONDITIONS TERNAIRES
  	// NUM  % 10 == 0 
  	// (CONDITION) ? SUCESS : false ;

  	/*$num = 9 ;

  	echo ($num % 10 == 0) ? 'true' : 'false';*/	
 ?>
