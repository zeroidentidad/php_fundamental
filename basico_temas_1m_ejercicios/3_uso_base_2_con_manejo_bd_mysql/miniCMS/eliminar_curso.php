<?php require_once './includes/funciones.php' ?>
<?php include './includes/cabecera.php' ?>
<?php 
if (intval($_GET["curso"])==0) {
	header("Location: contenido.php");
	exit();
}

$sql = "DELETE FROM cursos WHERE id =".$_GET["curso"];
mysqli_query($db, $sql);

if (mysqli_affected_rows($db)==1) {
	header("Location: contenido.php");
	exit();
}
else{
	print "<p>Ha ocurrido algo inesperado. Error:\n".mysqli_error($db)."</p>";
}
?>
<?php 
if (isset($db)) {
	mysqli_close($db);
}
?>