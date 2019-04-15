<?php 

//operaciones de array de numeros

$arreglo = array(78,25,10,69,57);

echo "<h3>Recorrer y mostrar arreglo:</h3>";
foreach ($arreglo as $numero) {
	print($numero).'<br/>';
}

echo "<h3>Ordenar y mostrar arreglo:</h3>";

sort($arreglo); //invertido: rsort($arreglo);
foreach ($arreglo as $numero) {
	print($numero).'<br/>';
}

echo "<h3>Mostrar longitud arreglo:</h3>";

print(count($arreglo)); // otro metodo: sizeof();

echo "<h3>Buscar en arreglo:</h3>";

if (!array_search(25, $arreglo)) {
	print '<p>El num NO existe en el array</p>';
} else {
	print '<p>El num SI existe en el array</p>';
}


 ?>