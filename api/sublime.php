<?php

include '../includes/db.php';
include '../lib/phrases.php';
$obj = new Phrases();
$final = $obj->getRandomPhrase();
$show = array();
$final['author'] = strip_tags($final['author']);
$final['phrase'] = str_replace ("   ", "", trim($final['phrase']));


header('Access-Control-Allow-Origin: *');
header('Cache-Control: no-cache, must-revalidate');
header('Content-type: application/json');

echo json_encode($final, JSON_PRETTY_PRINT);



?>
