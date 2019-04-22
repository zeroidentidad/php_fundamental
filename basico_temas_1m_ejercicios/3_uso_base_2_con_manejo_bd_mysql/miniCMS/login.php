<?php require("includes/session.php");?>
<?php require_once './includes/funciones.php' ?>
<?php
	if(isset($_SESSION["usuario_id"]))
	{
		header("Location: admin.php");
		exit();
	}
?>
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
		$sql = "SELECT * FROM usuarios WHERE usuario='{$usuario}' AND contrasena='{$contrasena}' LIMIT 1";
		$resultado = mysqli_query($db, $sql);
		if(mysqli_affected_rows($db)==1)
		{
			$usuario = mysqli_fetch_assoc($resultado);
			$_SESSION["usuario_id"]=$usuario["id"];
			$_SESSION["usuario"]=$usuario["usuario"];
			header("Location: admin.php");
			exit();
		}
		else
		{
			$mensaje = "<strong>No se pudo acceder.</strong> Error:\n".mysqli_error($db);
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
			<a href="index.php">Inicio</a>
			<br/>
			<br/>
			<a href="admin.php">Regresar a menú principal</a>
		</td>
		<td id="pagina">
			<h2>Administración</h2>
			<?php if(isset($mensaje)) { echo "<p>".$mensaje."</p>"; } ?>
			<form action="login.php" method="post">
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
				<input type="submit" value="Ingresar" />
			</form>
		</td>
	</tr>
</table>
<?php require_once './includes/pie.php' ?>