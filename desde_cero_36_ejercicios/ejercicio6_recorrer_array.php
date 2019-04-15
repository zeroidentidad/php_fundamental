<?php 

// array de meses y recorrelo con ciclo for para mostrarlos

$meses = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");

for ($i=0; $i < count($meses) ; $i++) { 
	print '<br/>'.$meses[$i].'<br/>';
}

 ?>