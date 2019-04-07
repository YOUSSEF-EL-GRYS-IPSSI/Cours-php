<?php
$userInformations['firstName'] = 'Thomas';
 $userInformations['lastName' ] = 'Machin';
  $userInformations['age'] = 20;
   $userInformations['isAGirl'] = false;
    $userInformations[10] = 'test';

$userInformations = [ 
	'firstName' => 'yann rend pas fou' ,
	 'lastName' => 'Machin' , 'age' => 22 ,
	  'isAGirl' => false , 
	  10 => 'test' 

	];
echo $userInformations['firstName']; //affiche Thomas 
echo $userInformations[10]; //affiche test 



?>