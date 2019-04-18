<?php 

// hacer funcion que recibe numero y muestra su tabla de multiplicar

function tabla($num){
	$tabla = '';
	for ($i=1; $i <=10 ; $i++) {
		$producto = $i*$num;
		$tabla .= "{$i} x {$num} = {$producto} <br/>";
	}

	return $tabla;
}

print '<h3>Tablas de multiplicar:</h3>';

for ($i=1; $i <=10 ; $i++) {
	print "<h3>Tabla del {$i}:</h3>";
	print tabla($i);
}

?>