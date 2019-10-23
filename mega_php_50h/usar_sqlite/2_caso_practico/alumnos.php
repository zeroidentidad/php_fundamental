<?php

class MyDB extends SQLite3
{
	function __construct()
	{
		$this->open('alumnos.db');
	}
}

$db = new MyDB();
if(!$db){
	echo $db->lastErrorMsg();
}else{
	echo '<b>Se ha creado y abierto la base de datos con éxito</b>';
	echo '<br/>';
}
 
 $sql =<<<EOF
      CREATE TABLE ALUMNOS
      (ID INT PRIMARY KEY     NOT NULL,
      NOMBRE          TEXT    NOT NULL,
      EDAD            INT     NOT NULL,
      CURSO       	  TEXT    NOT NULL,
      NOTA       REAL);
EOF;

$ret = $db->exec($sql);
if(!$ret){
	echo $db->lastErrorMsg();
}else{
	echo '<b>Tabla creada correctamente</b>';
	echo '<br/>';
}

$db->close();

?>