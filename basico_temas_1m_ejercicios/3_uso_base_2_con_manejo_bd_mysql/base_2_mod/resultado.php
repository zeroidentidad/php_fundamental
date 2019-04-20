<?php
require_once 'constantes.php';

$db = @mysqli_connect(_host, _usuario, _clave, _db, _puerto) 
	or die("No se pudo conectar.");
	mysqli_set_charset($db,"utf8");

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

	$consulta = "INSERT INTO juegos VALUES({$numCoincidencias})";
	mysqli_query($db, $consulta);
	?>
	<table border="1" align="center">
		<tr>
			<td colspan='6'>&nbsp;<button><a href="./formulario.php">Regresar</a></button></td>
		</tr>		
		<tr>
			<td colspan='6'>&nbsp;Números al azar:</td>
		</tr>
		<tr>
			<?php for( $i = 0 ; $i < 6 ; $i++ ){ ?>
				<td><?php echo $numAleatorios[$i] ?></td>
			<?php }	?>	
		</tr>
		<tr>
			<td colspan="6">&nbsp;Números elegidos:</td>
		</tr>
		<tr>
			<?php for( $i = 0 ; $i < 6 ; $i++ ){ ?>
				<td><?php echo $numElegidos[$i] ?></td>
			<?php }	?>	
		</tr>
		<tr>
			<td colspan="6">&nbsp;Número de coincidencias <?php echo $numCoincidencias; ?>&nbsp;</td>
		</tr>
	</table>
	<br/>
	<table border="1" align="center" width="500">
		<tr>
		<?php for ($i=0; $i <=6; $i++): ?>
			<td>&nbsp;Con <?php print $i; ?> coincidencias: <?php print obtenerRepeticionCoincidencias($i, $db); ?>&nbsp;</td>
		<?php endfor; ?>
		</tr>
	</table>
</body>
</html>
<?php 
if (isset($db)) {
	mysqli_close($db);
}
?>