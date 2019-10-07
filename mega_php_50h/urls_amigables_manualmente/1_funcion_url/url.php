<?php

//Función para URLs amigables
function seoURL($url){
	$url = utf8_decode($url);
	$url = str_replace(' ','-',$url);
	$url = str_replace('?','',$url);
	$url = str_replace('+','',$url);
	$url = str_replace(':','',$url);
	$url = str_replace('??','',$url);
	$url = str_replace('.','',$url);
	$url = str_replace('!','',$url);
	$url = str_replace('¿','',$url);
	$originales = 'ÀÁÈÉÌÍÒÓÙÙÜÇàáèéìíòóùúçÑñABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$modificadas ='aaeeiioouuucaaeeiioouucnnabcdefghijklmnopqrstuvwxyz';
	$url = strtr($url, utf8_decode($originales), $modificadas);
	return $url;
}

$nombre_de_producto = "Ejemplos para programar en PHP";
echo seoURL($nombre_de_producto).chr(10);
?>