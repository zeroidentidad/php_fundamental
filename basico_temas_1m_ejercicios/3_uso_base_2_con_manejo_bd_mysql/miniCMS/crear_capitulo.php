<?php require_once './includes/funciones.php' ?>
<?php include './includes/cabecera.php' ?>
<?php
	if(intval($_GET["curso"]) == 0)
	{
		header("Location: contenido.php");
		exit;
	}

	$campos = array("nombre", "posicion", "visibilidad");
	$errores = validar_campos_obligatorios($campos);
		
	if (!empty($errores)) {
		header("Location: nuevo_capitulo.php?curso=".urlencode($_GET["curso"]));
		exit();
	}
 ?>
<?php
	$curso_id = tratar_entrada($db,$_GET["curso"]); 
	$nombre = tratar_entrada($db, $_POST["nombre"]);
	$posicion = tratar_entrada($db, $_POST["posicion"]);
	$visibilidad = tratar_entrada($db, $_POST["visibilidad"]);
	$contenido = tratar_entrada($db, $_POST["contenido"]);

	$sql = "INSERT INTO capitulos VALUES(NULL,'{$nombre}',{$posicion},{$visibilidad},'{$contenido}',{$curso_id})";

	if(mysqli_query($db, $sql)){
		header("Location: contenido.php");
		exit();
	}
	else{
		print "<script>alert('\nNo se pudo crear capitulo. Error:\n".mysqli_error($db)."');</script>";
	}

	if (isset($db)) {
		mysqli_close($db);
	}
?>