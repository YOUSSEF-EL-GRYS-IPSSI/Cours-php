<?php
require('tools.php');

$query_AllChannel = $db->query('
        SELECT ch.title as channel_title, ch.description as channel_description
         FROM chat_user cu  JOIN channel_user cus
         ON  cu.id = cus.id_user
        JOIN  channel ch 
        ON  ch.id = cus.id_channel
        WHERE cu.id = 2
         ');


$allChannel = $query_AllChannel->fetchAll();

var_dump($allChannel);