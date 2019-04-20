<?php require_once './includes/funciones.php' ?>
<?php include './includes/cabecera.php' ?>
<?php
	if (isset($_GET['curso'])) {
		$curso_datos = obtener_curso_select($db, $_GET['curso']);
		$capitulo_datos = NULL;
	}
	elseif (isset($_GET['capitulo'])) {
		$capitulo_datos = obtener_capitulo_select($db, $_GET['capitulo']);
		$curso_datos = NULL;
	}else{
		$curso_datos = NULL;
		$capitulo_datos = NULL;
	}	
?>
	<div id="contenido">
		<table border="1" id="estructura">
			<tr>
				<td id="menu">
				<ul class="cursos">
				<?php
				$cursos = obtener_cursos($db);
				while ($curso = mysqli_fetch_assoc($cursos)) {
					print "<br/><li ";
					if ($curso["id"]==$curso_datos["id"]) {
						print "class='selected'";
					}
					print "><a href='contenido.php?curso=".urldecode($curso["id"])."'>".$curso["nombre"]."</a>
					</li><br/>";
				?>
					<ul class="capitulos">
					<?php
					$capitulos = obtener_capitulos($db, $curso["id"]);
					while ($capitulo = mysqli_fetch_assoc($capitulos)) {
						print "<li ";
						if ($capitulo["id"]==$capitulo_datos["id"]) {
							print "class='selected'";
						}						
						print "><a href='contenido.php?capitulo=".urldecode($capitulo["id"])."'>".$capitulo["nombre"]."</a>
						</li>";
					}
					?>	
					</ul>
				<?php
				}
				?>
				</ul>					
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
					</div>
					<?php } ?>
				</td>
			</tr>
		</table>
	</div>
<?php require_once './includes/pie.php' ?>