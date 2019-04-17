<?php 
require_once 'conexion.php';
?>
<!DOCTYPE HTML>
<html>
<head lang="es">
	<meta charset="utf-8" />
	<title>Ejercicios PHP</title>
	<link type="text/css" rel="stylesheet" href="./assets/css_ui/bootstrap.min.css" />
	<script type="text/javascript" src="./assets/js_ui/popper.min.js"></script>
	<script type="text/javascript" src="./assets/js_ui/jquery.min.js"></script><!--1ro-->
	<script type="text/javascript" src="./assets/js_ui/bootstrap.min.js"></script><!--2do-->
</head>
<body>
	<div class="container">
		<h1>Ejercicios PHP</h1>
		<hr/>
		
		<?php if(isset($_SESSION["logged"])){ ?>
		<div class="col-lg-10">
			<a href="index.php" class="btn btn-success">Inicio</a>
			<a href="crear.php" class="btn btn-primary">Crear nuevo</a>
		</div>
		<div class="col-lg-2">
			<?php echo "Bienvenido ".$_SESSION["logged"]["nombre"]." ". $_SESSION["logged"]["apellido"]; ?>
			<a href="logout.php">Cerrar Sesión</a>
		</div>
		<div class="clearfix"></div>
		<hr/>
		<?php } ?>
			
		<?php $variable = "Contenido programado"; ?>