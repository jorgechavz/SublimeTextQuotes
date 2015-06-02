<?php
require 'includes/db.php';
include 'lib/phrases.php';
include 'includes/simple_html_dom.php';
$obj = new Phrases();
$all = $obj->getAllPhrases();

while($row = mysql_fetch_assoc($all)){
  ?>
  <style>
    .rounded{
      width: 90px;
      height: 90px;
      background-size: cover;
      background-position: 50% 50%;
      border-radius: 50%;
      display: inline-block;
      margin: 5px;
      transition: all 0.5s ease;
    }
    .rounded:hover{
      border: 1px solid gray;
    }

  </style>
  <div class="rounded" style="background-image: url('<?= $row['img_src']; ?>')"></div>
  <?php
}


 ?>
