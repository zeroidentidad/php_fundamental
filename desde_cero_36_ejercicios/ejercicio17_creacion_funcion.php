<?php 

// pasar el codigo de bucle for de calculo de factorial a una funcion

function factorial($numero){

	$resultado = 1;

	for ($i=$numero; $i > 0 ; $i--) { 
		$resultado *= $i;
	}

	return $resultado;
}

$numv = 5;

print '<h3>Factorial de '.$numv.':</h3>';
print factorial($numv);

print '<h3>Factorial valor directo:</h3>';
print factorial(10);

 ?>