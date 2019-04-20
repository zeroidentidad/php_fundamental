<?php require_once './includes/funciones.php' ?>
<?php include './includes/cabecera.php' ?>
<?php 

	$nombre = tratar_entrada($_POST["nombre"]);
	$posicion = tratar_entrada($_POST["posicion"]);
	$visibilidad = tratar_entrada($_POST["visibilidad"]);

	$sql = "INSERT INTO cursos VALUES(NULL,'{$nombre}',{$posicion},{$visibilidad})";

	if(mysqli_query($db, $sql)){
		header("Location:contenido.php");
		//print "<script>alert('\nCurso creado correctamente.');</script>";
		exit();
	}
	else{
		print "<script>alert('\nNo se pudo crear curso. Error:\n'".mysqli_error().");</script>";
	}

	if (isset($db)) {
		mysqli_close($db);
	}
?>