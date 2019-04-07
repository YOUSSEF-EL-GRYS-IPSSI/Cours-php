<?php

require 'db_config.php';

$query = "SELECT * FROM users ORDER BY id DESC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{
	
echo $output .= '
 <tr  id=>
                                       
                                       <td>'.$row['titre'].'</td>
                                       <td>'.$row['author'].'</td>
                                       <td>'.$row['body'].'</td>
                                        
                                        <td><a class="btn btn-sm btn-danger" id="delete_product" data-id='.$row['id'].' href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i>Supprimer</a></td>
                                      
                                       
		                     </tr>
 
 ';
 
}



?>