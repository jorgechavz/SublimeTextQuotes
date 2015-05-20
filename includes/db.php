<?php
$connect = @mysql_connect("localhost","root","root");
($connect) ? $db = @mysql_select_db("sublimetextquotes") : die("Error: ".mysql_error());
($db) ? "" : die("Error ".mysql_error());
?>
