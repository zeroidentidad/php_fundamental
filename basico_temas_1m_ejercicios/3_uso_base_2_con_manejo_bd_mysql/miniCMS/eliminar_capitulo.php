<?php require("includes/session.php");?>
<?php verificar_sesion(); ?>
<?php require_once './includes/funciones.php' ?>
<?php include './includes/cabecera.php' ?>
<?php 
if (intval($_GET["capitulo"])==0) {
	header("Location: contenido.php");
	exit();
}

$sql = "DELETE FROM capitulos WHERE id =".$_GET["capitulo"];
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