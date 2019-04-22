<?php require("includes/session.php");?>
<?php verificar_sesion(); ?>
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
				<a href="nuevo_curso.php">Agregar un nuevo curso</a>
				<br/>			
				<br/>			
				<a href="admin.php">Administración</a>			
				</td>
				<td id="pagina">
					<?php if(!is_null($curso_datos)){ ?>
					<h2><?=$curso_datos["nombre"]; ?></h2>
					<?php }
						else if(!is_null($capitulo_datos)){ 
					?>
					<h3><?=$capitulo_datos["nombre"]; ?></h3>
					<div id="pagina-contenido">
						<?=$capitulo_datos["contenido"]; ?>
						<br /><br /><br />
						<a href="editar_capitulo.php?capitulo=<?php print urlencode($capitulo_datos["id"]) ?>">Editar capítulo</a>
					</div>
					<?php }
						else{
					?>
					<h2>Selecciona curso, capitulo</h2>
					<?php
						}		
					?>
				</td>
			</tr>
		</table>
	</div>
<?php require_once './includes/pie.php' ?>