<?php
require 'db_config.php';


$title=$_POST['title'];
$author=$_POST['author'];
$body=$_POST['isbn'];
	 
	 
$querys = "INSERT INTO users (titre,author,body)  VALUES (:titre,:author,:body)";
$data=$connect->prepare($querys);
$data->bindParam(':titre',$title,PDO::PARAM_STR);
$data->bindParam(':author',$author,PDO::PARAM_STR);
$data->bindParam(':body',$body,PDO::PARAM_STR);
$data->execute() or die(Print_r($connect->errorInfo()));
$Count=$data->rowCount() ;
 if($Count >0){

echo json_encode($data);

 }
 else {
	   echo "error";
 }


?>
