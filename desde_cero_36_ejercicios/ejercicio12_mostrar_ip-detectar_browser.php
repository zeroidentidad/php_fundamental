<?php 

//mostrar dirección IP de quien visita la pagina y si usa firefox saludar

$ip = $_SERVER["REMOTE_ADDR"];

$navegador = $_SERVER["HTTP_USER_AGENT"];

print 'IP: '.$ip.'<br/>';

if (strstr($navegador, 'Firefox')==true) {
	print 'Hola usuario Firefox.';
} elseif (strstr($navegador, 'Chrome')==true) {
	print 'Hola usuario Chrome.';
}

 ?>