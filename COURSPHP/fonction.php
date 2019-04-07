<?php
//FONCTION
/*
function hello($prenom, $nom){

echo 'bonjours '.$prenom.' '.$nom.'<br />';

}
hello('nicola','dupont');

*/
/*
 function formule($x,$y){
  
  $temps = $x * $y;
  $temps /= 5;
  $temps = $x + $temps - ($x + $y);
   return $temps;

 }
 $resultat = formule(52, 74);
 echo $resultat;
 */
//DEFJNIR UNE FONCTION : LES RACINE D'UNE EQUATION
 //ax²+bx+c = 0

 // DELTA = b² - 4*a*c

 // <0-> pas de solutions
 // = 0 -> une solutions -b/2*a
 // > 0 -> deux solutions (-b - racine(delta))/2*3
 //(-b + racine (delta))/2*a

function racine($a, $b ,$c){

 //dela
	$delta= $b*$b -(4*$a*$c);

	//conditions
	if ($delta <0) {
		echo "Il n'y a pas de solutions.";
	}
	else if ($delta==0) {
		$result= -$b/(2*$a)
		echo "il ya une solutions: ".$result;
	}
	else if ($delta > 0) {
		$racineA = (-$b -sqrt($delta))/(2*$a);
		$racineB = (-$b +sqrt($delta))/(2*$a);


		echo "il ya deux solutions, x1 = ".$racineA.",x2 =".$racineB;
	}


}
racine(5,7,1);
  ?>