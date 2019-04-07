<?php

//array_flip

$array = array("max ","maria ","yass ");
/*
$array_two = array_flip($array);
  echo $array_two["max"];
*/
  //array_key_exists
  /*
  if(array_key_exists(2, $user)){
  	echo "yes";
  }
  else{
  	echo "ERROR 404";
  }*/
  
  //count
  /*
  echo count($array);
*/
  //sort
  sort($array);

  foreach ($array as $name) {
  	echo $name[0]."<br/> <br/> <br/>";
  }



  ?>