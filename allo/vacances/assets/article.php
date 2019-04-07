<?php
header("Access-Control-Allow-Origin: *");

try{
    $db = new PDO('mysql:host=localhost;dbname=dom;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $exception)
{
    die( 'Erreur : ' . $exception->getMessage() );
}

$response = new \stdClass();
$title = $_POST['title'];
$content =  $_POST['content'];

if (isset($title) && !empty($title) && isset($content) && !empty($content)) {
    $query = $db->prepare('INSERT INTO article (title, content) VALUES (?, ?)');
    $query->execute(array($title, $content));

    $lastInsertion = $db->lastInsertId();

    $selection = $db->prepare('SELECT * FROM article WHERE id=?');
    $selection->execute(array($lastInsertion));

    $response->type = 1;
    $response->message = "Article ajouté !";
    $response->article = $selection->fetch(PDO::FETCH_ASSOC);
    echo json_encode($response);
}
else {
    $response->type = 0;
    $response->message = "Article non ajouté !";
    echo json_encode($response);
}