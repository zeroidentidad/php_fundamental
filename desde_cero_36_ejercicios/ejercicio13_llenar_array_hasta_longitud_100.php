<?php 

// añadir valores a array mientras su longitud menor a 100 y despues mostrar en pantalla

$arreglo = array();

for ($i=0; $i <100 ; $i++) { 

	//array_push($arreglo, $i);

	$arreglo["num-{$i}"] = $i;

}

var_dump($arreglo);

 ?>