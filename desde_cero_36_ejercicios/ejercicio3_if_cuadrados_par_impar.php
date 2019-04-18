<?php 
// uso ciclo para imprimir los cuadrados de los primeros 30 numeros enteros y que diga si es par o impar

for ($i=1; $i <= 30; $i++) { 

	$cuadrado = $i*$i;

	echo "El cuadrado de ".$i." es ".$cuadrado." y es ";

	if(($cuadrado%2)==0){ echo "par"; } else { echo "impar"; }

	echo "<br/>";;

}

 ?>