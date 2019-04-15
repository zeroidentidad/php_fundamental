<?php 

// comprobar si variable vacia, convertir a mayusculas, formatear a negritas al mostrar

$variable='';

if (empty($variable)) {
	$variable = strtoupper('Texto asignado');
	print "<strong>{$variable}</strong>";
} else {
	print('Tiene ya valor');
}


 ?>