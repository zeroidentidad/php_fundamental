<?php

class ClaseCortar
{
	
	public function cortar($texto, $longitud){
		$final = '';
		$total = 0;
		
		//Separamos el texo por los espacios
		foreach (explode(' ', $texto) as $palabra)
		{
			if($palabra != ''){
				$final .= ' '.$palabra;
				$total += strlen($palabra);
			}
			
			if($total >= $longitud){
				break;
			}
	}
	
	return $final;
	}
}

$utils = new ClaseCortar();

$texto = 'Don Quijote de la Manchaa es una novela escrita por el español Miguel de Cervantes Saavedra. Publicada su primera parte con la titulación de El ingenioso hidalgo don Quijote de la Mancha a comienzos de 1605, en 1615 apareció su continuación con el título de Segunda parte del ingenioso caballero don Quijote de la Mancha. El Quijote de 1605 se publicó dividido en cuatro partes, pero al aparecer el Quijote de 1615 en calidad de Segunda parte de la obra, quedó revocada, de hecho la partición en cuatro secciones del volumen publicado diez años antes por Cervantes.';

$textoo_limitado = $utils->cortar($texto, 100);

echo "<h1>Versión completa:</h1>";
echo $texto. "...";

echo "<h1>Versión reducida:</h1>";
echo $texto_limitado. "...";

?>

