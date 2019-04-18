<?php 
require_once 'conexion.php';

$sql = "CREATE TABLE IF NOT EXISTS usuarios(
usuario_id int(255) auto_increment not null,
nombre varchar(255), 
apellido varchar(255),
bio text,
email varchar(255),
contrasena varchar(255),
imagen varchar(255),
rol varchar(20),
CONSTRAINT pk_usuarios PRIMARY KEY (usuario_id)
);";

$crear_tabla_usuarios = mysqli_query($db, $sql);

if ($crear_tabla_usuarios) {
	echo "La tabla usuarios se ha creado correctamente.";
}

 ?>