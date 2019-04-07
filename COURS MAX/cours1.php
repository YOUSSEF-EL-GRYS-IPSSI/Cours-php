<?php
$users = [ 

0 => ['firstName' => 'Thomas', 'lastName' => 'Machin'], 
1 => ['firstName' => 'Arthur', 'lastName' => 'Truc'],  
2 => ['firstName' => 'Clément', 'lastName' => 'Bidule'],  
3 => ['firstName' => 'Camille', 'lastName' => 'Truc'],   
];



    echo "<ul>";
foreach ($users as $users) {
	echo '<li>'.$users["firstName"] . ' '.$users["lastName"].'</li>';
	# code...
}
    echo "</ul>";
?>  

 