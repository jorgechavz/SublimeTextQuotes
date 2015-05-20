<?php

require 'includes/db.php';
include 'lib/phrases.php';
include 'includes/simple_html_dom.php';
$obj = new Phrases();
$count = 0;
$url = "http://www.goodreads.com/quotes/tag/education";
$html 	= file_get_html($url);
$quotes = $html->find(".leftContainer",0);

foreach ($quotes->find(".quote") as $value) {
  //  echo $value;
  $count++;
  $img_src = $value->find(".leftAlignedImage",0);
  if($img_src){
    $img = $img_src->find("img",0);
    $img_src = $img->src;
    $idimg = explode("/",$img_src);
    $cuatro = $idimg[4];
    $cuatro = substr ($cuatro, 0, strlen($cuatro) - 1);
    $cuatro = $cuatro."8";

    $idimg[4] = $cuatro;

    $img_src = implode("/",$idimg);

    $quoteText = $value->find(".quoteText",0);

    $author = $quoteText->find("a",0)->plaintext;

    $quoteText->find("a",0)->outertext='';

    $quoteText = strip_tags($quoteText);
    $quoteText = trim($quoteText);

    $quoteText = preg_replace("/&#?[a-z0-9]+;/i","",$quoteText);
    $quoteText = addslashes($quoteText);

  }else{
    echo "nel";

  }

    if(strlen($quoteText) < 150){
      if($quoteText != ""){
        $added = $obj->addQuote($quoteText,$author,$img_src);
        if($added){
          echo "Author: ".$author."<br>";
          echo "Quote: ".$quoteText."<br>";
          echo "Image: ".$img_src."<br><br>";
        }
      }
    }
}
echo $count;

 ?>
