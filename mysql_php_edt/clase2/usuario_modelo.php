<?php

require_once "BD.php";

class Usuario_modelo extends BD {
    public $nombre;
    public $paterno;
    public $materno;
    public $email;

    public function insertar($registro){
        $conexion = parent::conectar();
        try {
        $sql = "INSERT INTO usuarios (nombre, paterno, materno, email) VALUES (:nombre, :paterno, :materno, :email)";

        $insertar = $conexion->prepare($sql);

		$insertar->bindParam(":nombre", $registro["nombre"], PDO::PARAM_STR);
		$insertar->bindParam(":paterno", $registro["paterno"], PDO::PARAM_STR);
		$insertar->bindParam(":materno", $registro["materno"], PDO::PARAM_STR);
		$insertar->bindParam(":email", $registro["email"], PDO::PARAM_STR);

		if($insertar->execute()){
			echo 'Insercion correcta';
		}       

        }catch(PDOException $e){
            exit('Error:'.$e->getMessage());
        }        
    }

    public function consultar(){
        $conexion = parent::conectar();
        try {
            $sql = "SELECT * FROM usuarios";
            $consultar = $conexion->prepare($sql);
            $consultar->execute();
            return $consultar->fetchAll();            
        }catch(PDOException $e){
            exit('Error:'.$e->getMessage());
        }
    }

    public function actualizar($registro){
        $conexion = parent::conectar();
        try {
        $sql = "UPDATE usuarios SET nombre=:nombre, paterno=:paterno, materno=:materno, email=:email
                WHERE id=:id";

        $insertar = $conexion->prepare($sql);

		$insertar->bindParam(":nombre", $registro["nombre"], PDO::PARAM_STR);
		$insertar->bindParam(":paterno", $registro["paterno"], PDO::PARAM_STR);
		$insertar->bindParam(":materno", $registro["materno"], PDO::PARAM_STR);
		$insertar->bindParam(":email", $registro["email"], PDO::PARAM_STR);
		$insertar->bindParam(":id", $registro["id"], PDO::PARAM_INT);

		if($insertar->execute()){
			echo 'Actualizacion correcta';
		}       

        }catch(PDOException $e){
            exit('Error:'.$e->getMessage());
        }        
    }

    function eliminar($accion, $registro){
        $conexion = parent::conectar();
        if ($accion=='todos'){
            try {
                $sql = "DELETE FROM usuarios";
                $eliminar = $conexion->prepare($sql);
                $eliminar->execute();
            } catch(PDOException $e){
            exit('Error:'.$e->getMessage());
            }
        }else {
            try {
                $sql = "DELETE FROM usuarios WHERE id=:id";
                $eliminar = $conexion->prepare($sql);
                $eliminar->bindParam(":id", $registro, PDO::PARAM_INT);
                $eliminar->execute();
            } catch(PDOException $e){
            exit('Error:'.$e->getMessage());
            }
        }
    }

}