<?php 

if (isset($_POST["enviar"])) {
	if (!empty($_POST["nombre"]) && strlen($_POST["nombre"])<=20 && !is_numeric($_POST["nombre"]) && !preg_match("/[0-9]/", $_POST["nombre"])) {
		echo $_POST["nombre"]."<br/>";
	}
	if (!empty($_POST["apellido"]) && strlen($_POST["apellido"])<=20 && !is_numeric($_POST["apellido"]) && !preg_match("/[0-9]/", $_POST["apellido"])) {
		echo $_POST["apellido"]."<br/>";
	}
	if (!empty($_POST["bio"])) {
		echo $_POST["bio"]."<br/>";
	}
	if (!empty($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		echo $_POST["email"]."<br/>";
	}
	if (!empty($_FILES["imagen"]["tmp_name"]) && isset($_FILES["imagen"])) {
		echo "Se ha cargado imagen<br/>";
	}
	if (!empty($_POST["contrasena"]) && strlen($_POST["contrasena"])>=6) {
		echo sha1($_POST["contrasena"])."<br/>";
	}
	if (!empty($_POST["rol"])) {
		echo $_POST["rol"]."<br/>";
	}						
}

 ?>