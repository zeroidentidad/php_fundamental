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

function tratar_entrada($valor){

	$magic_quotes_estatus = get_magic_quotes_gpc();

	if (function_exists("mysqli_real_escape_string")) {
		if (magic_quotes_estatus()) {
			$consulta = stripslashes($consulta)
		}
		$consulta = mysqli_real_escape_string($consulta);
	}
	else{
		if (!magic_quotes_estatus()) {
			$consulta = addslashes($consulta);
		}	
	}

	return $consulta;
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

function obtener_pagina($db){
	global $curso_datos;
	global $capitulo_datos;

	if (isset($_GET['curso'])) {
		$curso_datos = obtener_curso_select($db, $_GET['curso']);
		$capitulo_datos = NULL;
	}
	elseif (isset($_GET['capitulo'])) {
		$capitulo_datos = obtener_capitulo_select($db, $_GET['capitulo']);
		$curso_datos = NULL;
	}else{
		$curso_datos = NULL;
		$capitulo_datos = NULL;
	}	

}

function menu($db, $curso_datos, $capitulo_datos){
	$cursos = obtener_cursos($db);
	$salida = '';
	while ($curso = mysqli_fetch_assoc($cursos)) {
		$salida .= "<br/><li ";
		if ($curso["id"]==$curso_datos["id"]) {
			$salida .= "class='selected'";
		}
		$salida .= "><a href='contenido.php?curso=".urldecode($curso["id"])."'>".$curso["nombre"]."</a>
		</li><br/>";
		$salida .= "<ul class='capitulos'>";
			$capitulos = obtener_capitulos($db, $curso["id"]);
			while ($capitulo = mysqli_fetch_assoc($capitulos)) {
				$salida .= "<li ";
				if ($capitulo["id"]==$capitulo_datos["id"]) {
					$salida .= "class='selected'";
				}						
				$salida .= "><a href='contenido.php?capitulo=".urldecode($capitulo["id"])."'>".$capitulo["nombre"]."</a>
				</li>";
			}
		$salida .= "</ul>";

	}
	return $salida;
}

?>