<?php 
require 'includes/db.php';
include 'lib/phrases.php';
include 'includes/simple_html_dom.php';
$obj = new Phrases();

$url 	= "http://www.adafruit.com";
$html 	= file_get_html($url);
$phrase = $html->find('.quotes-large');
$phrase = $phrase[0];
$parts = explode("-", $phrase);
echo $parts[0];

$author = $phrase->find('a');
$href 	= $author[0]->href;
$image 	= file_get_html($href);
$image 	= $image->find(".image");
$image 	= $image[0]->find('img');


//Our final data
$image 	= $image[0]->src;
$phrase = $parts[0];
$author = $author[0];



$obj->addQuote($phrase,$author,$image);
?>