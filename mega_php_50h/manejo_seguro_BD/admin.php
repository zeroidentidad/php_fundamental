<?php
include("MySQL.php");

$sql = new MySQL('localhost','root','','database');

//$persona = $sql->enviarQuery("INSERT INTO personas (nombre, apellido, fnacimiento) VALUES ('Moises','Gutierrez','2016-12-11')");

//$sql->error;
//echo $persona.'<br/>';

//$personas = $sql->enviarQuery("SELECT * FROM personas WHERE nombre LIKE '".$sql->filtrar('Federico')."'");
//echo '<pre>';
//print_r($personas);
//echo '</pre>';

//$consulta = $sql->enviarQuery("TRUNCA personas");

//$update = $sql->enviarQuery("UPDATE personas SET nombre = 'Jose' WHERE id='1'");
//echo $update."<br/>";

//$personas = $sql->enviarQuery("SELECT * FROM personas");
//echo '<pre>';
//print_r($personas);


$sql->useCache = true;
$resultado = $sql->enviarQuery("SELECT persona, apellido FROM personas");

echo '<pre>';
print_r($resultado);

?>