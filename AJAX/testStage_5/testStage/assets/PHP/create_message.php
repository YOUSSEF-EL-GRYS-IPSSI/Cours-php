<?php
require('tools.php');

setlocale(LC_TIME,"fr_FR");
$res = new stdClass();

$data = file_get_contents('php://input');
$json = json_decode($data);

$valueMessage = $json->{'valueMessage'};

if (!empty($valueMessage)){

    $userID = $_SESSION['user_id'];



    $micro_date = microtime();
    $date_array = explode(" ",$micro_date);
    $date = date("Y-m-d H:i:s",$date_array[1]);
    $filterTime =   substr($date_array[0], -5, 5);
    $timeToInsert = str_replace(  $filterTime,"", $date_array[0]);



    $filterTimeTwo =   substr(   $timeToInsert, -5, 1);
    $timeToInsertTwo = str_replace(  $filterTimeTwo,"",   $timeToInsert);

        $insert_message = $db->prepare('INSERT INTO message (content, user_id, time ) VALUES (?, ?, ?)');
        $insert_message->execute(
            array(
                $valueMessage,
                $userID,
                $date.$timeToInsertTwo,
            ));

    $query_message = $db->prepare('
        SELECT m.content, c.id as user_id, c.pseudo, c.color, m.time
         FROM message m  JOIN chat_user c
         ON  m.user_id = c.id  
         WHERE m.time = ?
         ');


    $query_message->execute(array($date.$timeToInsertTwo)) ;
    $message = $query_message->fetchAll();


    if ($message[0]['user_id'] == $_SESSION['user_id']){
        $res->positionMessage = "right";
    }
    else{
        $res->positionMessage = "left";
    }


    $res->messageContent = $message[0]['content'];
    $res->userColor = $message[0]["color"];
    $res->userPseudo = $message[0]["pseudo"];
    $res->messageTime = $message[0]['time'];

}else{
    $res->msg = "champ vide";
}
$query_last_date = $db->query('SELECT time FROM message ORDER BY time DESC LIMIT 1');

$last_date= $query_last_date->fetchColumn();

$_SESSION['last_time'] = $last_date;


echo json_encode($res);









