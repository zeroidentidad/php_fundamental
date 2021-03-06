<?php require("includes/session.php");?>
<?php verificar_sesion(); ?>
<?php require_once './includes/funciones.php' ?>
<?php include './includes/cabecera.php' ?>
<?php
if(isset($_POST["usuario"]))
{
	$errores = array();
	$errores = array_merge($errores, validar_campos_obligatorios(array("usuario","contrasena")));
	$max_caracteres = array("usuario" => 30, "contrasena" => 30);
	foreach($max_caracteres as $campo => $max)
	{
		if(strlen($_POST[$campo])>$max)
		{
			$errores[] = $campo;	
		}			
	}

	$usuario = trim(tratar_entrada($db, $_POST["usuario"]));
	$contrasena = sha1(trim(tratar_entrada($db, $_POST["contrasena"])));

	if(empty($errores))
	{
		$sql = "INSERT INTO usuarios (usuario, contrasena) VALUES
					('{$usuario}','{$contrasena}')";
		$resultado = mysqli_query($db, $sql);
		if($resultado)
		{
			$mensaje = "<strong>Usuario ha sido creado.</strong>";
		}
		else
		{
			$mensaje = "<strong>Ha ocurrido algo inesperado.</strong> Error:\n".mysqli_error($db);
		}
	}
	else
	{
		$mensaje = "<strong>Se han encontrado ".count($errores)." errores</strong>";
	}
}
?>
<table id="estructura">
	<tr>
		<td id="menu">
			<a href="admin.php">Regresar a menú principal</a>
		</td>
		<td id="pagina">
			<h2>Crear usuario</h2>
			<?php if(isset($mensaje)) { echo "<p>".$mensaje."</p>"; } ?>
			<form action="nuevo_usuario.php" method="post">
				<table>
					<tr>
						<td>Nombre de usuario:</td>
						<td><input type="text" name="usuario" /></td>
					</tr>
					<tr>
						<td>Contraseña:</td>
						<td><input type="password" name="contrasena" /></td>
					</tr>
				</table>
				<input type="submit" value="Crear usuario" />
			</form>
		</td>
	</tr>
</table>
<?php require_once './includes/pie.php' ?>