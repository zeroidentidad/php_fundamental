<?php
include 'includes/redirect.php';
include 'includes/header.php';

$usuarios = mysqli_query($db, "SELECT * FROM usuarios");
$num_total_usuarios = mysqli_num_rows($usuarios);

if($num_total_usuarios > 0){
	$rows_por_pagina = 3;
	$pagina = false;
	
	if(isset($_GET["pagina"])){
		$pagina = $_GET["pagina"];
	}
	
	if(!$pagina){
		$inicio = 0;
		$pagina = 1;
	}else{
		$inicio = ($pagina-1) * $rows_por_pagina;
	}
	
	$total_paginas = ceil($num_total_usuarios / $rows_por_pagina);
	
	$sql="SELECT * FROM usuarios ORDER BY usuario_id DESC LIMIT {$inicio}, {$rows_por_pagina};";
	$usuarios = mysqli_query($db, $sql);
	
}else{
	echo "No hay usuarios";
}
?>

<table class="table">
	<tr>
		<th>Nombre</th>
		<th>Apellidos</th>
		<th>Email</th>
		<th>Ver/Editar</th>
	</tr>
	<?php while ($usuario = mysqli_fetch_assoc($usuarios)) { ?>
		<tr>
			<td><?=$usuario["nombre"]?></td>
			<td><?=$usuario["apellido"]?></td>
			<td><?=$usuario["email"]?></td>
			<td>
				<a href="ver.php?id=<?=$usuario["usuario_id"]?>" class="btn btn-success">Ver</a>
				<a href="editar.php?id=<?=$usuario["usuario_id"]?>" class="btn btn-warning">Editar</a>
				<?php if(isset($_SESSION["logged"]) && $_SESSION["logged"]["rol"] == 2){ ?>
					<a href="borrar.php?id=<?=$usuario["usuario_id"]?>" class="btn btn-danger">Borrar</a>
				<?php } ?>
			</td>
		</tr>
	<?php } ?>
</table>

<?php if($num_total_usuarios >= 1){ ?>
	<ul class="pagination">
		<li><button><a href="?pagina=<?=($pagina-1)?>"><</a></button></li>
		<?php for($i = 1; $i<=$total_paginas; $i++){ ?>

			<?php if($pagina == $i){ ?>
				<li class="disabled"><button><a href="#"><?=$i?></a></button></li>
			<?php }else{ ?>
				<li><button><a href="?pagina=<?=$i?>"><?=$i?></a></button></li>
			<?php } ?>
			
		<?php } ?>
		<li><button><a href="?pagina=<?php $mostrar_pagina=($pagina+1); if($mostrar_pagina <= $total_paginas){ echo $mostrar_pagina ; }else{ echo $total_paginas; } ?>">></a></button></li>
	</ul>
<?php }?>
<?php
include 'includes/footer.php';
?>
