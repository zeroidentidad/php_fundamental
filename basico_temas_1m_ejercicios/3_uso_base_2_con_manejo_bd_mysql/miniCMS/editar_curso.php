<?php require_once './includes/funciones.php' ?>
<?php include './includes/cabecera.php' ?>
<?php 
if (intval($_GET["curso"])==0) {
	header("Location: contenido.php");
	exit();
}

if (isset($_POST["nombre"])) {
	$campos = array("nombre", "posicion", "visibilidad");

	$errores = validar_campos_obligatorios($campos);

	if (empty($errores)) {
		$curso_id = tratar_entrada($db, $_GET["curso"]);

		$nombre = tratar_entrada($db, $_POST["nombre"]);
		$posicion = tratar_entrada($db, $_POST["posicion"]);
		$visibilidad = tratar_entrada($db, $_POST["visibilidad"]);

		$sql = "UPDATE cursos SET nombre='{$nombre}', posicion={$posicion}, visibilidad={$visibilidad}
				WHERE id={$curso_id}";
		$resultado = mysqli_query($db, $sql);
		if (mysqli_affected_rows($db)==1) {
			$mensaje = "<strong>Curso actualizado correctamente.</strong>";
		}
		elseif (mysqli_affected_rows($db)==0) {
			$mensaje = "<strong>Modificación con mismos valores.</strong>";
		}
		else{
			$mensaje = "<strong>Ha ocurrido algo inesperado.</strong> Error:\n".mysqli_error($db);
		}
	} else {
		$mensaje = "<strong>Se han obtenido ".count($errores)." errores.</strong>";
	}

} 
?>
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
					<h2>Editar curso: <?php print $curso_datos["nombre"] ?></h2>
					<form action="editar_curso.php?curso=<?php print urlencode($curso_datos["id"]); ?>" method="post">
						<label for="nombre">Nombre curso:</label>
						<input type="text" name="nombre" value="<?=$curso_datos["nombre"] ?>">
						<br/>
						<label for="posicion">Posición:</label>
						<select name="posicion">
							<?php
							$total_cursos = obtener_cursos($db);
							$num_cursos = mysqli_num_rows($total_cursos);
							for ($i=1; $i <= ($num_cursos+1) ; $i++) { 
								print "<option value='{$i}'";
								if ($curso_datos["posicion"]==$i) {
									print " selected";
								}
								print ">{$i}</option>";
							}
							?>
						</select>
						<br/>
						<label for="visibilidad">Visibiliad:</label>
						<input type="radio" name="visibilidad" value="0"
						<?php if ($curso_datos["visibilidad"]==0) { print "checked"; } ?>
						>Ocultar</input>				
						<input type="radio" name="visibilidad" value="1"
						<?php if ($curso_datos["visibilidad"]==1) { print "checked"; } ?> 
						>Mostrar</input>
						<br/><br/>
						<input type="submit" name="submit" value="Editar">&nbsp;
						<button><a href="./contenido.php">Cancelar</a></button>&nbsp;
						<button><a href="./eliminar_curso.php?curso=<?php print urlencode($curso_datos["id"]); ?>">Borrar</a></button>
						<br/>
						<p><?php if (isset($mensaje)) { 
							print $mensaje; 
							foreach ($errores as $error) {
								print "<br/> - ".$error; 
							}
						} ?></p>			
					</form>
					<hr />
					<h3>Capítulos del curso:</h3>
					<ul>
						<?php		
						$capitulos = obtener_capitulos($db, $curso_datos["id"]);
						while($capitulo = mysqli_fetch_assoc($capitulos))
						{
						  echo "<li>
								<a href=\"contenido.php?capitulo=".$capitulo["id"]."\">".$capitulo["nombre"]."</a>
								</li>";
						}
						?>
					</ul>
					<br/>
					<a href="nuevo_capitulo.php?curso=<?php echo urlencode($curso_datos["id"]); ?>">Agregar capítulo
					</a>					
				</td>
			</tr>
		</table>
	</div>
<?php require_once './includes/pie.php' ?>