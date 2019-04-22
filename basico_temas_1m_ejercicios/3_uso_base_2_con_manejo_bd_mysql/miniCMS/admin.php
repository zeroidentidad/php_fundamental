<?php require("includes/session.php");?>
<?php verificar_sesion(); ?>
<?php require_once './includes/funciones.php' ?>
<?php include './includes/cabecera.php' ?>
	<div id="contenido">
		<table id="estructura">
			<tr>
				<td id="menu">&nbsp;</td>
				<td id="pagina">
					<h3>Administración</h3>
					<p>Bienvenido a panel Administración, <strong><?=strtoupper($_SESSION["usuario"]) ?></strong></p>
					<ul>
						<li><a href="contenido.php">Administrar contenidos</a></li>
						<li><a href="nuevo_usuario.php">Crear usuarios</a></li>
						<li><a href="logout.php">Salir</a></li>
					</ul>
				</td>
			</tr>
		</table>
	</div>
<?php require_once './includes/pie.php' ?>