<?php
function conectar(){
    try {
        $cadena = 'mysql:host=localhost;dbname=mysql_php_edt';
        $conexion = new PDO($cadena, 'remoto', 'x1234567');

        return $conexion;
    } catch (PDOException $e) {
       echo "Error: ".$e->getMessage();
    }
}
?>