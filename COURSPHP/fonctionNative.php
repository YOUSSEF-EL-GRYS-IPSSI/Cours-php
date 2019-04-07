<?php

// FONCTION


//function Formule($x, $y){
//
// $temp = $x * $y ;
// $temp /= 5;
// $temp = $x +  $temp -($x + $y);
// return $temp;
//
//}
//$resultat = Formule(52, 74);
//
//echo $resultat;



//FONCTION NATIVE

// $string = 'Bienvenue sur la formation ultime en PHP et MySQL';

//STRLEN
//echo 'ECOLE WEBSTART : '.strlen($string).'<br>';

//STR_REPLACE
//echo 'le string transformée :'.str_replace('Bienvenue',' Welcome',$string).'<br>';


//STRLOWER

//echo strtolower($string)

//STRTOUPPER

//echo strtoupper($string);

//SUBSTR

//echo substr($string, 0, 34);


//FONCTION NATIVE EN PHP

$array = array(
    "Categories",
    "admin",
    "id");

//$array_two = array_flip($array);
//if (array_key_exists(10, $array)) {
// echo 'BIENVENUE';
//}
//else{
// echo 'ERROR 404';
//}
//echo count($array);

sort($array);

foreach ($array as $name){
 echo $name.'<br>';
}
?>