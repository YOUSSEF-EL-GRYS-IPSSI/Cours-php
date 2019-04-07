<?php
header("Access-Control-Allow-Origin: *");

try{
    $db = new PDO('mysql:host=localhost;dbname=blog_ajax;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $exception)
{
    die( 'Erreur : ' . $exception->getMessage() );
}
$queryAll = $db->query('SELECT * FROM article ORDER BY id DESC');
$result = $queryAll->fetchAll();

if (!empty($result)) {

    $response = new stdClass();
    $array = [];

    $sizeResult= sizeof($result);

    for ($i = 0; $i < $sizeResult; $i++) {

        $array[$i] = [
            "title" => $result[$i]['title'],
            "content" => $result[$i]['content'],
            "articleId" => $result[$i]['id'],
        ];

    }
    $response->tableau = $array;
} else {
    $response->message = "Aucun article a afficher !";
}


echo json_encode($response);