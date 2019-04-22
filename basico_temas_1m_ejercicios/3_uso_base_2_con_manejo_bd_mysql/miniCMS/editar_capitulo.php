<?php require("includes/session.php");?>
<?php verificar_sesion(); ?>
<?php require_once './includes/funciones.php' ?>
<?php include './includes/cabecera.php' ?>
<?php 
if (intval($_GET["capitulo"])==0) {
	header("Location: contenido.php");
	exit();
}

if (isset($_POST["nombre"])) {
	$campos = array("nombre", "posicion", "visibilidad");

	$errores = validar_campos_obligatorios($campos);

	if (empty($errores)) {
		$capitulo_id = tratar_entrada($db, $_GET["capitulo"]);

		$nombre = tratar_entrada($db, $_POST["nombre"]);
		$posicion = tratar_entrada($db, $_POST["posicion"]);
		$visibilidad = tratar_entrada($db, $_POST["visibilidad"]);
		$contenido = tratar_entrada($db, $_POST["contenido"]);

		$sql = "UPDATE capitulos SET nombre='{$nombre}', posicion={$posicion}, visibilidad={$visibilidad}, contenido='{$contenido}'
				WHERE id={$capitulo_id}";
		$resultado = mysqli_query($db, $sql);
		if (mysqli_affected_rows($db)==1) {
			$mensaje = "<strong>Capitulo actualizado correctamente.</strong><br/><br/>";
		}
		elseif (mysqli_affected_rows($db)==0) {
			$mensaje = "<strong>Modificación con mismos valores.</strong><br/><br/>";
		}
		else{
			$mensaje = "<strong>Ha ocurrido algo inesperado.<strong> Error:\n".mysqli_error($db);
		}
	} else {
		$mensaje = "</strong>Se han obtenido ".count($errores)." errores.</strong>";
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
					<h2>Editar capitulo: <?php print $capitulo_datos["nombre"] ?></h2>
					<?php
					if(isset($mensaje)){
						print $mensaje;
						foreach($errores as $error)
						{
							print "<br/> - ".$error;
						}
					}
					?>					
					<form action="editar_capitulo.php?capitulo=<?php print urlencode($capitulo_datos["id"]); ?>" method="post">
						<label for="nombre">Nombre capitulo:</label>
						<input type="text" name="nombre" value="<?=$capitulo_datos["nombre"] ?>">
						<br/>
						<label for="posicion">Posición:</label>
						<select name="posicion">
							<?php
							$total_capitulos = obtener_capitulos($db, $capitulo_datos["curso_id"]);
							$num_capitulos = mysqli_num_rows($total_capitulos);
							for ($i=1; $i <= ($num_capitulos+1) ; $i++) { 
								print "<option value='{$i}'";
								if ($capitulo_datos["posicion"]==$i) {
									print " selected";
								}
								print ">{$i}</option>";
							}
							?>
						</select>
						<br/>
						<label for="visibilidad">Visibiliad:</label>
						<input type="radio" name="visibilidad" value="0"
						<?php if ($capitulo_datos["visibilidad"]==0) { print "checked"; } ?>
						>Ocultar</input>				
						<input type="radio" name="visibilidad" value="1"
						<?php if ($capitulo_datos["visibilidad"]==1) { print "checked"; } ?> 
						>Mostrar</input>
						<br/>
						<label for="contenido">Contenido:</label>
						<textarea name="contenido" rows="20" cols="80"><?php echo $capitulo_datos["contenido"] ?></textarea>					
						<br/><br/>
						<input type="submit" name="submit" value="Editar">&nbsp;
						<button><a href="./editar_curso.php?curso=<?php print urlencode($curso_datos["id"]); ?>">Cancelar</a></button>&nbsp;
						<button><a href="./eliminar_capitulo.php?capitulo=<?php print urlencode($capitulo_datos["id"]); ?>">Borrar</a></button>		
					</form>
				</td>
			</tr>
		</table>
	</div>
<?php require_once './includes/pie.php' ?>