<?php
header("Access-Control-Allow-Origin: *");

try{
    $db = new PDO('mysql:host=localhost;dbname=blog_ajax;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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
    $response->message = "Votre article a été ajouté avec succès !";
    $response->article = $selection->fetch(PDO::FETCH_ASSOC);
    echo json_encode($response);
}
else {
    $response->type = 0;
    $response->message = "L'ajout de votre article a échoué !";
    echo json_encode($response);
}