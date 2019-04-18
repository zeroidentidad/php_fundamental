<?php 

// multiplicar los 20 primeros numeros

$numero=1;
$contador=2;

while ( $contador <= 20) {

	$numero *= $contador;

	echo $numero."<br/>";

	$contador++;

}

echo "Resultado: ".$numero;

 ?>