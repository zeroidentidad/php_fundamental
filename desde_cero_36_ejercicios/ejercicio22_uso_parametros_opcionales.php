<?php 

// hacer funcion que recibe numero y muestra su tabla de multiplicar y reciba parametro opcional para imprimir en HTML

function tabla($num, $html=null){
	$tabla = '';

	for ($i=1; $i <=10 ; $i++) {
		$producto = $i*$num;
		$tabla .= "{$i} x {$num} = {$producto} <br/>";
	}

	if ($html!=null) {
		print "<h3>Tabla del {$num}:</h3>";
		echo $tabla;
	}

	return $tabla;
}

print '<h3>Tablas de multiplicar:</h3>';

for ($i=1; $i <=10 ; $i++) {
	tabla($i, true);
}

?>