<?php 
require 'includes/db.php';
include 'lib/phrases.php';
include 'includes/simple_html_dom.php';
$obj = new Phrases();

$url 	= "http://www.adafruit.com";
$html 	= file_get_html($url);
if($phrase = $html->find('.quotes-large')){
}else{
	$phrase = $html->find('.quotes-medium');
}
$phrase = $phrase[0];

$author = $phrase->find('a');
$author = $author[0];
$href 	= $author->href;
$phrase = $phrase->plaintext;
$parts = explode("-", $phrase);
if($author != "")
	$image 	= file_get_html($href);
	if($image 	= $image->find(".image"))
		$image 	= $image[0]->find('img');	
		$image 	= $image[0]->src;
//Our final data
$phrase = $parts[0];
$phrase = str_replace("'", "", $phrase);
$phrase = str_replace('"', "", $phrase);


if($phrase != "")
	$added = $obj->addQuote($phrase,$author,$image);
	if(!$added)
		header("Location: quote.php");
?>