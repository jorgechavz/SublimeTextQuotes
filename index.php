<?php 
	include 'includes/simple_html_dom.php';
	$url = "http://www.adafruit.com";
	$html = file_get_html($url);
	$frase = $html->find('.quotes-large');
	$frase = $frase[0];
	$autor = $frase->find('a');
	$href = $autor[0]->href;
	$imagen = file_get_html($href);
	$imagen = $imagen->find(".image");
	$imagen = $imagen[0]->find('img');
	$partes = explode("-", $frase);
	
	$imagen = $imagen[0]->src;
	$frase = $partes[0];
	$autor = $autor[0];
	
	
?>