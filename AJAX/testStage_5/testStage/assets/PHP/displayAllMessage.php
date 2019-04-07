<?php
require('tools.php');

$query_AllMessage = $db->query('
        SELECT m.content, c.pseudo, c.id as user_id, c.color, m.time
         FROM message m  JOIN chat_user c
         ON  m.user_id = c.id  
         ORDER by m.time ASC 
         ');


$allMessage = $query_AllMessage->fetchAll();


$array = [];

for ($i = 0; $i < sizeof($allMessage); $i++) {



    $array[$i] = [
        "message_content" => $allMessage[$i]['content'],
        "user_color" => $allMessage[$i]['color'],
        "user_pseudo" => $allMessage[$i]['pseudo'],
        "message_time" => $allMessage[$i]['time'],
    ];

    if ($allMessage[$i]['user_id'] == $_SESSION['user_id']){
        $array[$i]['positionMessage'] ="right";
    }
    else{
        $array[$i]['positionMessage'] ="left";
    }


}

$query_last_date = $db->query('SELECT time FROM message ORDER BY time DESC LIMIT 1');
$last_date= $query_last_date->fetchColumn();


$_SESSION['last_time'] = $last_date;

$res = new stdClass();
$res->arrayAllMessage = $array;
echo json_encode($res);

