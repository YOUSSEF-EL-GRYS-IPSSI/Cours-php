<?php
require ('tools.php');

$res = new stdClass();

$res->userName = $_SESSION['user']['firstname'];
echo json_encode($res);
