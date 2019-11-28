<?php
	$archivo=$_POST['file'];

	$directorio="archivos/";

	$ruta=$directorio.realpath($archivo);

	$ruta=realpath($ruta);

	if($ruta!=$directorio.$archivo){
		echo "error!";
	}
?>