<?php require_once './includes/funciones.php' ?>
<?php include './includes/cabecera.php' ?>
<?php 
$datos = mysqli_query($db, "SELECT nombre from cursos");
 ?>
	<div id="contenido">
		<table border="1" id="estructura">
			<tr>
				<td id="menu">
				<?php 
				while ($curso = mysqli_fetch_assoc($datos)) {
				?>
				<li><?=$curso["nombre"] ?></li>
				<?php	
				}
				?>					
				</td>
				<td id="pagina">
					<h3>Edición contenido</h3>
				</td>
			</tr>
		</table>
	</div>
<?php require_once './includes/pie.php' ?>