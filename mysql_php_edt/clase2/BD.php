<?php

const DB = 'mysql';
const HOST = 'localhost';
const CHARSET = 'utf8';

abstract class BD {
    private static $db_usuario = 'remoto';
    private static $db_pass  = 'x1234567';
    private static $db_host = HOST;
    private static $db_nombre = 'mysql_php_edt';
    private static $db_charset = CHARSET;
    private $conexion;

    public function conectar(){
        try {
            $dbcon = "{$DB}:host=".self::$db_host.";dbname=".self::$db_nombre;
            $pdo = new PDO($dbcon, self::$db_usuario, self::$db_pass);
            $pdo -> exec("SET CHARACTER SET ".self::$db_charset);
        }catch(PDOException $e){
            exit('Error:'.$e->getMessage());
        }
    }

    private function desconectar(){
        $this->conexion=null;
    }

    #CRUD

    abstract protected function insertar($registro){

    }

    abstract protected function consultar(){

    }

    abstract protected function actualizar($registro){

    }

    abstract protected function eliminar($registro){

    }


}
