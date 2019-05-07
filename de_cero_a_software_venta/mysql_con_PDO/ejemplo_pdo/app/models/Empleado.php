<?php
namespace App\Models;

use Exception;

class Empleado{
    private $pdo;

    public function __construct(){
        $this->pdo = \Core\Database::getConnection();
    }

    public function listar(){

        $resultado = [];

        try {
            $sentencia = $this->pdo->prepare('select * from empleado');
            $sentencia->execute();

            $resultado = $sentencia->fetchAll();
        } catch (Exception $e) {
            
        }

        return $resultado;
    }
}

?>