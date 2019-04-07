<?php require_once 'tomy.php';

$query_title = $db->query('SELECT title FROM article ');
	$title= $query_title->fetch();
	echo $title["title"]

  ?>