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
      SELECT * from EMPRESA;
EOF;

$ret = $db->query($sql);
while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
    echo "ID = ".$row['ID']."<br/>";
    echo "NOMBRE = ".$row['NOMBRE']."<br/>";
    echo "DIRECCION = ".$row['DIRECCION']."<br/>";
    echo "SUELDO = ".$row['SUELDO']."<br/>";
    echo "<hr>";
}
echo '<b>Se ha generado la consulta con éxito</b>';
$db->close();
