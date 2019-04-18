<?php 

if (isset($_POST["enviar"])) {
	if (!empty($_POST["nombre"])) {
		echo $_POST["nombre"]."<br/>";
	}
	if (!empty($_POST["apellido"])) {
		echo $_POST["apellido"]."<br/>";
	}
	if (!empty($_POST["bio"])) {
		echo $_POST["bio"]."<br/>";
	}
	if (!empty($_POST["email"])) {
		echo $_POST["email"]."<br/>";
	}
	if (!empty($_POST["imagen"])) {
		echo $_POST["imagen"]."<br/>";
	}
	if (!empty($_POST["contrasena"])) {
		echo sha1($_POST["contrasena"])."<br/>";
	}
	if (!empty($_POST["rol"])) {
		echo $_POST["rol"]."<br/>";
	}						
}

 ?>