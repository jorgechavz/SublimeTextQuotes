<?php
include '../includes/db.php';
include '../lib/phrases.php';
$obj = new Phrases();
$authors = $obj->getAuthors();
$autores = array();
$autores2 = array();
while($row = mysql_fetch_assoc($authors)){
    $row["author"] = strip_tags($row['author']);

    array_push($autores, $row);
}
$autores2['authors'] = $autores;
header('Access-Control-Allow-Origin: *');
header('Cache-Control: no-cache, must-revalidate');
header('Content-type: application/json');

echo json_encode($autores2, JSON_PRETTY_PRINT);

 ?>
