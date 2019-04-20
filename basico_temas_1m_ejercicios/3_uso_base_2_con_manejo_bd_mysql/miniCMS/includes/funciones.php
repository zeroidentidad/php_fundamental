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
	$sql = "SELECT * FROM cursos  ORDER BY posicion ASC";
	$cursos = mysqli_query($db, $sql);
	verificar_consulta($cursos);

	return $cursos;
}

function obtener_capitulos($db, $curso_id){
	$sql = "SELECT * FROM capitulos WHERE curso_id=".$curso_id." ORDER BY posicion ASC";
	$capitulos = mysqli_query($db, $sql);
	verificar_consulta($capitulos);

	return $capitulos;
}

function obtener_curso_select($db, $curso_id){
	$sql = "SELECT * FROM cursos WHERE id=".$curso_id." LIMIT 1";
	$resultado = mysqli_query($db, $sql);
	verificar_consulta($resultado);
	$curso = mysqli_fetch_assoc($resultado);

	return $curso;	
}

function obtener_capitulo_select($db, $capitulo_id){
	$sql = "SELECT * FROM capitulos WHERE id=".$capitulo_id." LIMIT 1";
	$resultado = mysqli_query($db, $sql);
	verificar_consulta($resultado);
	$capitulo = mysqli_fetch_assoc($resultado);

	return $capitulo;	
}

?>