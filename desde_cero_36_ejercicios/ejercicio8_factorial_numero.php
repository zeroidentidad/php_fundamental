<?php 

//calcular factorial de un numero almacenado en una variable

$numero = $_GET["num"];
$factorial = 1;

if (isset($_GET["calcular"])) {
	for ($i=1; $i <= $numero; $i++) { 
		$factorial *= $i;
	}

	print('Factorial de '.$numero.' = '.$factorial);
}

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <form method="GET">
 	<input type="text" name="num">
 	<input type="submit" name="calcular" value="Calcular F!">
 </form>
 </body>
 </html>