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
      INSERT INTO EMPRESA (ID,NOMBRE,EDAD,DIRECCION,SUELDO)
	  VALUES (1, 'Jesus', 42, 'Tab', 200000.00);
	  
	  INSERT INTO EMPRESA (ID,NOMBRE,EDAD,DIRECCION,SUELDO)
	  VALUES (2, 'Antonio', 29, 'Mex', 150000.00);
	  
	  INSERT INTO EMPRESA (ID,NOMBRE,EDAD,DIRECCION,SUELDO)
	  VALUES (3, 'Person', 36, 'Villa', 120000.00);
	  
	  INSERT INTO EMPRESA (ID,NOMBRE,EDAD,DIRECCION,SUELDO)
	  VALUES (4, 'Gente x', 21, 'Centro', 50000.00);
EOF;

$ret = $db->exec($sql);
if (!$ret) {
    echo $db->lastErrorMsg();
} else {
    echo '<b>Registros guardados correctamente.</b>';
    echo '<br/>';
}

$db->close();
