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
            $sql = "SELECT e.id, e.nombre, e.apellido, e.fecha_nacimiento,
                    p.nombre profesion, p.sueldo sueldo_inicial,
                    p.sueldo + IFNULL(sum(es.sueldo), 0) sueldo_final
                    FROM empleado e
                    INNER JOIN profesion p
                    ON e.profesion_id = p.id
                    LEFT JOIN empleado_sueldo es
                    ON es.empleado_id = e.id
                    GROUP BY e.id
                    ORDER BY e.nombre";

            $sentencia = $this->pdo->prepare($sql);
            $sentencia->execute();

            $resultado = $sentencia->fetchAll();
        } catch (Exception $e) {
            
        }

        return $resultado;
    }

    public function guardar(Empleado $modelo): bool{

        $resultado = false;

        try {

            if (empty($modelo->id)) {
                $sql= 'insert into empleado
                (nombre,apellido,fecha_nacimiento, profesion_id)
                values (?, ?, ?, ?)';
                $sentencia = $this->pdo->prepare($sql);
                $sentencia->execute([
                    $modelo->nombre,
                    $modelo->apellido,
                    $modelo->fecha_nacimiento,
                    $modelo->profesion_id
                ]);                
            }else{
                $sql= 'update empleado set
                nombre= ?,
                apellido= ?,
                fecha_nacimiento= ?,
                profesion_id= ?
                where id = ?';
                $sentencia = $this->pdo->prepare($sql);
                $sentencia->execute([
                    $modelo->nombre,
                    $modelo->apellido,
                    $modelo->fecha_nacimiento,
                    $modelo->profesion_id,
                    $modelo->id
                ]);                
            }

            $resultado = true;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
            
        }

        return $resultado;
    }

    public function obtener(int $id): Empleado{

        $resultado = new Empleado;

        try {
            $sentencia = $this->pdo->prepare('select * from empleado where id = ?');
            $sentencia->execute([$id]);

            $fetch = $sentencia->fetch();

            $resultado->id=$fetch->id;
            $resultado->nombre=$fetch->nombre;
            $resultado->apellido=$fetch->apellido;
            $resultado->fecha_nacimiento=$fetch->fecha_nacimiento;
            $resultado->profesion_id=$fetch->profesion_id;

        } catch (Exception $e) {
            
        }

        return $resultado;
    } 
    
    public function eliminar(int $id): bool{

        $resultado = false;

        try {
            $sentencia = $this->pdo->prepare('delete from empleado where id = ?');
            $sentencia->execute([$id]);

            $resultado = true;
        } catch (Exception $e) {
            
        }

        return $resultado;
    }    

}

?>