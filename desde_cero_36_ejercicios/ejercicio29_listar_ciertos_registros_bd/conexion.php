<?php 

//$db = new mysqli("localhost", "root", "", "ejercicio27");

$_host = "localhost";
$_usuario = "remoto"; 
$_clave = "x1234567";
$_db = "ejercicio27";
$_puerto = "3306";

$db = mysqli_connect($_host, $_usuario, $_clave, $_db, $_puerto) or die("ADVERTENCIA: No hay conexión a la base de datos.");

mysqli_set_charset($db,"utf8"); //mysqli_query($db, "SET NAMES 'utf8'");

 ?>