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

function validar_campos_obligatorios($campos){
	$errores = array();
	foreach ($campos as $valor) {
		if (!isset($_POST[$valor])||(empty($_POST[$valor])&&!is_numeric($_POST[$valor]))) {
			$errores[]=$valor;
		}
	}
	return $errores;	
}

function tratar_entrada($db, $valor){

	$magic_quotes_estatus = get_magic_quotes_gpc();

	if (function_exists("mysqli_real_escape_string")) {
		if ($magic_quotes_estatus) {
			$valor = stripslashes($valor);
		}
		$valor = mysqli_real_escape_string($db, $valor);
	}
	else{
		if (!$magic_quotes_estatus) {
			$valor = addslashes($valor);
		}	
	}

	return $valor;
}


function obtener_cursos($db, $publico){
	$sql = "SELECT * FROM cursos ";
	if ($publico) {
	$sql.= "WHERE visibilidad=1 "; 
	}
	$sql.= "ORDER BY posicion ASC";
	$cursos = mysqli_query($db, $sql);
	verificar_consulta($cursos);

	return $cursos;
}

function obtener_capitulos($db, $curso_id, $publico){
	$sql = "SELECT * FROM capitulos WHERE curso_id={$curso_id} ";
	if ($publico) {
	$sql.= "AND visibilidad=1 "; 
	}
	$sql.="ORDER BY posicion ASC";	
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
		$capitulo_datos = capitulo_por_defecto($db, $_GET['curso']);
	}
	elseif (isset($_GET['capitulo'])) {
		$capitulo_datos = obtener_capitulo_select($db, $_GET['capitulo']);
		$curso_datos = NULL;
	}else{
		$curso_datos = NULL;
		$capitulo_datos = NULL;
	}	

}

function capitulo_por_defecto($db, $curso_id){
	$resultado = obtener_capitulos($db, $curso_id, true);
	if ($capitulo = mysqli_fetch_assoc($resultado)) {
		return $capitulo;
	} else{
		return NULL;
	}
}

function menu($db, $curso_datos, $capitulo_datos){
	$cursos = obtener_cursos($db, false);
	$salida = '';
	while ($curso = mysqli_fetch_assoc($cursos)) {
		$salida .= "<br/><li ";
		if ($curso["id"]==$curso_datos["id"]) {
			$salida .= "class='selected'";
		}
		$salida .= "><a href='editar_curso.php?curso=".urldecode($curso["id"])."'>".$curso["nombre"]."</a>
		</li><br/>";
		$salida .= "<ul class='capitulos'>";
			$capitulos = obtener_capitulos($db, $curso["id"], false);
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

function menu_publico($db, $curso_datos, $capitulo_datos){
	$cursos = obtener_cursos($db, true);
	$salida = '';

		while ($curso = mysqli_fetch_assoc($cursos)) {
			$salida .= "<br/><li ";
			if ($curso["id"]==$curso_datos["id"]) {
				$salida .= "class='selected'";
			}
			$salida .= "><a href='index.php?curso=".urldecode($curso["id"])."'>".$curso["nombre"]."</a>
			</li><br/>";
			if ($curso["id"]==$curso_datos["id"]) {
				$salida .= "<ul class='capitulos'>";
				$capitulos = obtener_capitulos($db, $curso["id"], true);
				while ($capitulo = mysqli_fetch_assoc($capitulos)) {
					$salida .= "<li ";
					if ($capitulo["id"]==$capitulo_datos["id"]) {
						$salida .= "class='selected'";
					}						
					$salida .= "><a href='index.php?capitulo=".urldecode($capitulo["id"])."'>".$capitulo["nombre"]."</a>
					</li>";
				}
				$salida .= "</ul>";
			}
		}

	return $salida;
}


?>