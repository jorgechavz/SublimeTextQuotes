<?php 
include_once '../includes/db.php';
include_once '../lib/phrases.php';
$obj = new Phrases();
if(isset($_GET['phrase_id'])){
	$phrase_id 	= $_GET['phrase_id'];
	$which 		= $_GET['which'];
	if($which == 'next'){
		$phrase = $obj->getNextPhrase($phrase_id);	
	}else if($which == 'prev'){
		$phrase = $obj->getPreviousPhrase($phrase_id);	
	}
	
}else{
	$phrase = $obj->getRandomPhrase();	
}

$phraseconvert = $obj->getNicePhrase($phrase['phrase']);
$phrase['phrase'] = "<img src='img/first_quote.png'>".$phraseconvert."<img src='img/last_quote.png'>";

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$json = json_encode($phrase);
echo $json;		

?>