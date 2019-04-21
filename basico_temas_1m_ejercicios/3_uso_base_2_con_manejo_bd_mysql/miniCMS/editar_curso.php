<?php require_once './includes/funciones.php' ?>
<?php include './includes/cabecera.php' ?>
<?php obtener_pagina($db); ?>
	<div id="contenido">
		<table border="1" id="estructura">
			<tr>
				<td id="menu">
				<ul class="cursos">
					<?php print menu($db, $curso_datos, $capitulo_datos); ?>
				</ul>
				<br/>				
				</td>
				<td id="pagina">
					<h2>Editar curso: <?php print $curso_datos["nombre"] ?></h2>
					<form action="editar_curso.php?curso=<?php print urlencode($curso_datos["id"]); ?>" method="post">
						<label for="nombre">Nombre curso:</label>
						<input type="text" name="nombre">
						<br/>
						<label for="posicion">Posición:</label>
						<select name="posicion">
							<?php
							$total_cursos = obtener_cursos($db);
							$num_cursos = mysqli_num_rows($total_cursos);
							for ($i=1; $i <= ($num_cursos+1) ; $i++) { 
								print '<option value="'.$i.'">'.$i.'</option>';
							}
							?>
						</select>
						<br/>
						<label for="visibilidad">Visibiliad:</label>
						<input type="radio" name="visibilidad" value="0">Ocultar</input>				
						<input type="radio" name="visibilidad" value="1">Mostrar</input>
						<br/><br/>
						<input type="submit" name="submit" value="Agregar">&nbsp;
						<button><a href="./contenido.php">Cancelar</a></button>			
					</form>
				</td>
			</tr>
		</table>
	</div>
<?php require_once './includes/pie.php' ?>