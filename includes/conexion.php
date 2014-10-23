<?php 
$conexion = @mysql_connect("localhost","root","root");
($conexion) ? $db = @mysql_select_db("sublimetextquotes") : die("Error en la conexion: ".mysql_error());
($db) ? "" : die("Error al seleccionar la base de datos ".mysql_error());
?>