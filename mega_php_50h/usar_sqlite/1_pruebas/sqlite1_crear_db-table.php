<?php

class MyDB extends SQLite3
{
    public function __construct()
    {
        $this->open('prueba.db');
    }
}

$db = new MyDB();
if (!$db) {
    echo $db->lastErrorMsg();
} else {
    echo '<b>Se ha abierto la base de datos con éxito</b>';
    echo '<br/>';
}
 
 $sql =<<<EOF
      CREATE TABLE EMPRESA
      (ID INT PRIMARY KEY     NOT NULL,
      NOMBRE          TEXT    NOT NULL,
      EDAD            INT     NOT NULL,
      DIRECCION       CHAR(50),
      SUELDO          REAL);
EOF;

$ret = $db->exec($sql);
if (!$ret) {
    echo $db->lastErrorMsg();
} else {
    echo '<b>Tabla creada correctamente</b>';
    echo '<br/>';
}

$db->close();
