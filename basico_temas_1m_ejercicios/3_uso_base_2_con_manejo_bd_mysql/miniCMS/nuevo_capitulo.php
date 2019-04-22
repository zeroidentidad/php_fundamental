<?php require_once './includes/funciones.php' ?>
<?php include './includes/cabecera.php' ?>
<?php obtener_pagina($db); ?>
	<div id="contenido">
		<table id="estructura">
			<tr>
				<td id="menu">
				<ul class="cursos">
					<?php print menu($db, $curso_datos, $capitulo_datos); ?>
				</ul>
				<br/>				
				</td>
				<td id="pagina">
					<h2>Agregar capitulo:</h2>
					<form action="crear_capitulo.php?curso=<?php echo urlencode($curso_datos["id"]); ?>" method="post">
						<label for="nombre">Nombre capitulo:</label>
						<input type="text" name="nombre">
						<br/>
						<label for="posicion">Posición:</label>
						<select name="posicion">
							<?php
							$total_capitulos = obtener_capitulos($db, $curso_datos["id"]);
							$num_capitulos = mysqli_num_rows($total_capitulos);
							for ($i=1; $i <= ($num_capitulos+1) ; $i++) { 
								print '<option value="'.$i.'">'.$i.'</option>';
							}
							?>
						</select>
						<br/>
						<label for="visibilidad">Visibiliad:</label>
						<input type="radio" name="visibilidad" value="0">Ocultar</input>				
						<input type="radio" name="visibilidad" value="1">Mostrar</input>
						<br/>
						<label for="contenido">Contenido:</label>
						<textarea name="contenido" rows="20" cols="80"></textarea>
						<br/><br/>
						<input type="submit" name="submit" value="Agregar">&nbsp;
						<button><a href="./editar_curso.php?curso=<?php print urlencode($curso_datos["id"]); ?>">Cancelar</a></button>			
					</form>
				</td>
			</tr>
		</table>
	</div>
<?php require_once './includes/pie.php' ?>