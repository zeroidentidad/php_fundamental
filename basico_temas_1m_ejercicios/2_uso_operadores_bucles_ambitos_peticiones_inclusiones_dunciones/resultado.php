<?php

include_once('funciones.php');

if(!isset($_POST['submit']) || !valoresPermitidos())
{
	header('Location: formulario.php');
	exit();
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Resultados</title>
</head>

<body>
	<?php
	$numElegidos = obtenerNumerosElegidos();
	$numAleatorios = obtenerNumerosAleatorios();
	$numCoincidencias = obtenerNumeroCoincidencias($numElegidos,$numAleatorios);
	?>
	<table border="1" align="center">
		<tr>
			<td colspan='6'>Números al azar</td>
		</tr>
		<tr>
			<?php for( $i = 0 ; $i < 6 ; $i++ ){ ?>
				<td><?php echo $numAleatorios[$i] ?></td>
			<?php }	?>	
		</tr>
		<tr>
			<td colspan="6">Números elegidos</td>
		</tr>
		<tr>
			<?php for( $i = 0 ; $i < 6 ; $i++ ){ ?>
				<td><?php echo $numElegidos[$i] ?></td>
			<?php }	?>	
		</tr>
		<tr>
			<td colspan="6">Número de coincidencias <?php echo $numCoincidencias; ?></td>
		</tr>
	</table>
</body>
</html>