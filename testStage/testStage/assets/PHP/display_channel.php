<?php
require('tools.php');



$query_AllChannel = $db->prepare('
        SELECT ch.title as channel_title, ch.description as channel_description, ch.id as channel_id
         FROM chat_user cu  JOIN channel_user cus
         ON  cu.id = cus.id_user
        JOIN  channel ch 
        ON  ch.id = cus.id_channel
      WHERE cu.id = ?
    
         ');

$query_AllChannel->execute(
    array(
        $_SESSION['user']['id']
    ));

$allChannel = $query_AllChannel->fetchAll();

$array = [];
for ($i = 0; $i < sizeof($allChannel); $i++) {

    $array[$i] = [
        "channel_title" => $allChannel[$i]['channel_title'],
        "channel_description" => $allChannel[$i]['channel_description'],
        "channel_id" => $allChannel[$i]['channel_id'],
    ];
}

$res = new stdClass();
$res->arrayAllUserChannel = $array;
echo json_encode($res);