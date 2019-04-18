<?php
session_start();
if(isset($_SESSION["logged"]) && $_SESSION["logged"]["rol"] == 2){
	require_once 'includes/conexion.php';
	
	if(isset($_GET["id"])){
		$id = $_GET["id"];
		$delete = mysqli_query($db, "DELETE FROM usuarios WHERE usuario_id = {$id}");
	}
}
header("Location: index.php");
?>

