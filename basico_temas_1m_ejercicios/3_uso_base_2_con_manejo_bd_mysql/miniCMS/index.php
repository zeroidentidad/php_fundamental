<?php require_once './includes/funciones.php' ?>
<?php include './includes/cabecera.php' ?>
<?php obtener_pagina($db); ?>
	<div id="contenido">
		<table id="estructura">
			<tr>
				<td id="menu">
				<ul class="cursos">
					<?php print menu_publico($db, $curso_datos, $capitulo_datos); ?>
				</ul>
				<br/>				
				</td>
				<td id="pagina">
					<?php if(!is_null($capitulo_datos)){ 
					?>
					<h3><?=$capitulo_datos["nombre"]; ?></h3>
					<div id="pagina-contenido">
						<?=nl2br($capitulo_datos["contenido"]); ?>
					</div>
					<?php }
						else{
					?>
					<h2>Bienvenido a Cursos Online</h2>
					<?php
						}		
					?>
				</td>
				<td align="right"><a href="login.php">Acceso Admin</a></td>
			</tr>
		</table>
	</div>
<?php require_once './includes/pie.php' ?>