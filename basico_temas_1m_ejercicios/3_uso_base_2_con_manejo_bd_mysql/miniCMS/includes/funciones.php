<?php 
require_once 'constantes.php';
$db = mysqli_connect(_host, _usuario, _clave, _db, _puerto) 
	or die("No se pudo conectar. Error: ".mysqli_error());
mysqli_set_charset($db,"utf8"); //mysqli_query($db, "SET NAMES 'utf8'");

/* bloque de funciones: */

function verificar_consulta($consulta){
	if (!$consulta) {
		die("No se pudo hacer consulta. Error: ".mysqli_error());
	}
}

function obtener_cursos($db){
	$sql = "SELECT * from cursos  ORDER BY posicion ASC ";
	$cursos = mysqli_query($db, $sql);
	verificar_consulta($cursos);

	return $cursos;
}

function obtener_capitulos($db, $curso_id){
	$sql = "SELECT * from capitulos WHERE curso_id=".$curso_id." ORDER BY posicion ASC";
	$capitulos = mysqli_query($db, $sql);
	verificar_consulta($capitulos);

	return $capitulos;
}

?>