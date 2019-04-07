<?php
session_start();

try {
    $db = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $exception) {
    die('Erreur : ' . $exception->getMessage());
}
header("Access-Control-Allow-Origin: *");