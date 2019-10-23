<?php

class MyDB extends SQLite3
{
	function __construct()
	{
		$this->open('alumnos.db');
	}
}

//Variables recibidas del formulario
$ID = $_POST['id'];
$NOMBRE = $_POST['nombre'];
$EDAD = $_POST['edad'];
$CURSO = $_POST['curso'];
$NOTA = $_POST['nota'];

//instancia clase para SQLite3
$db = new MyDB();
if(!$db){
	echo $db->lastErrorMsg();
}else{
	echo '<b>Se ha abierto la base de datos con éxito</b>';
	echo '<br/>';
}
 
 $sql =<<<EOF
      INSERT INTO ALUMNOS (ID,NOMBRE,EDAD,CURSO,NOTA)
	  VALUES ($ID, '$NOMBRE', $EDAD, '$CURSO', $NOTA);
EOF;

$ret = $db->exec($sql);
if(!$ret){
	echo $db->lastErrorMsg();
}else{
	$db->close();
	Header('location:veralumnos.php');
}

?>