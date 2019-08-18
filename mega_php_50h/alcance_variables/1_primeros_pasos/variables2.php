<?php

function miNombre(){
	global $nombre; 
	$nombre = "Fernando";
	echo $nombre;
	echo '<br/>';
}

miNombre();
echo $nombre;

?>