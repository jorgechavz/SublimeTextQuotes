<?php 

$conexion = mysql_connect("localhost","jorge_chavez","+)}9#i2U[T=W");
($conexion) ? $db = mysql_select_db("jorge_xpressa") : die("Error en la conexxion: ".mysql_error());
($db) ? "" : die("Error al seleccionar la base de datos ".mysql_error());
 ?>