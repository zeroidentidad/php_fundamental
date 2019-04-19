<?php 
require_once 'constantes.php';

$db = mysqli_connect(_host, _usuario, _clave, _db, _puerto) 
	or die("No se pudo conectar. Error:".mysqli_error());

mysqli_set_charset($db,"utf8"); //mysqli_query($db, "SET NAMES 'utf8'");

?>