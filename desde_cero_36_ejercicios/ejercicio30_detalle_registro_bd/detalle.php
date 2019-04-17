<?php 

require_once 'conexion.php';

// pagina para mostrar el detalle completo de algun registro pasanso ID por peticion GET

if (!isset($_GET["id"]) && empty($_GET["id"]) && !is_numeric($_GET["id"])) {
	header("Location:./listar.php");
}

$sql = "SELECT * FROM usuarios WHERE usuario_id = ".$_GET["id"];

$select_usuario = mysqli_query($db, $sql);

$datos = mysqli_fetch_assoc($select_usuario);

?>

<h3>Detalle:</h3>

<table>
	<tr>
		<td>Nombre:</td><td><?=$datos["nombre"]?></td>
	</tr>
	<tr>
		<td>Apellido:</td><td><?=$datos["apellido"]?></td>
	</tr>
	<tr>
		<td>Biografia:</td><td><?=$datos["bio"]?></td>
	</tr>
	<tr>
		<td>Email:</td><td><?=$datos["email"]?></td>
	</tr>
	<tr>
		<td>Imagen:</td><td><?=$datos["imagen"]?></td>
	</tr>
	<tr>
		<td>Contraseña:</td><td><?=$datos["contrasena"]?></td>
	</tr>
	<tr>
		<td>Rol:</td><td><?=$datos["rol"]?></td>
	</tr>					
</table>
	<a href='./listar.php' >Volver</a>	