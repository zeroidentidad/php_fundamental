<?php 

// imprimir tabla de multiplicar de numero recibido por GET ?num=1

if(isset($_GET['num'])&&is_numeric($_GET['num'])){
	$numero = $_GET['num'];
} else {
	$numero = rand(1, 10);
	echo "<p>Usando numero aleatorio...</p>";
}

echo "<h3>Tabla de: ".$numero."</h3>";

for ($i=1; $i <= 10 ; $i++) { 

	echo $numero." x ".$i." = ".($numero*$i);
	echo "<br/>";
}

 ?>