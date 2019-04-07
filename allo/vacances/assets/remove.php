<?php
header("Access-Control-Allow-Origin: *");

try{
    $db = new PDO('mysql:host=localhost;dbname=dom;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $exception)
{
    die( 'Erreur : ' . $exception->getMessage() );
}

$data = file_get_contents('php://input');
$json = json_decode($data);

$articleId = $json->{'idArticle'};

$deleteArticle = $db->prepare('DELETE FROM article WHERE id = ?');
$deleteArticle->execute(array($articleId));


$response = new stdClass();
$response->message = "Article supprimé !";
echo json_encode($response);