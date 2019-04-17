<?php 

require_once 'conexion.php';

$sql = "INSERT INTO usuarios VALUES(
NULL,
'Fulano ".rand(1,10)."',
'De tal ".rand(1,10)."',
'Soy humano',
'mail@algo".rand(1,10).".com',
'".sha1("passx")."',
NULL,
'1'
)";

$insertar_usuario = mysqli_query($db, $sql);

if ($insertar_usuario) {
	echo "Se ha insertado correctamente.";
}

 ?>