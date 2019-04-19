<?php require_once './includes/funciones.php' ?>
<?php include './includes/cabecera.php' ?>
	<div id="contenido">
		<table border="1" id="estructura">
			<tr>
				<td id="menu">
				<ul class="cursos">
				<?php
				$cursos = obtener_cursos($db);
				while ($curso = mysqli_fetch_assoc($cursos)) {
					print '<br/><li>'.$curso["nombre"].'</li><br/>';
				?>
					<ul class="capitulos">
					<?php
					$capitulos = obtener_capitulos($db, $curso["id"]);
					while ($capitulo = mysqli_fetch_assoc($capitulos)) {
						print '<li>'.$capitulo["nombre"].'</li>';
					}
					?>	
					</ul>
				<?php
				}
				?>
				</ul>					
				</td>
				<td id="pagina">
					<h3>Edición contenido</h3>
				</td>
			</tr>
		</table>
	</div>
<?php require_once './includes/pie.php' ?>