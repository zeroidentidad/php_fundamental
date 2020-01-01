<?php
namespace App\Model;

use App\Lib\DataBase;

class UserModel {

    private $db;
    private $table = 'alumno';

    public function __CONSTRUCT() {
        $this->db = DataBase::StartUp();
    }    

    public function Obtener($id) {
        return $this->db
            ->from($this->table, $id)
            //->from($this->table)->where('pkname',$id)
            ->fetch();
    }    

    public function Listar() {
        return  $this->db
            ->from($this->table)
            ->select($this->table.'.*, carrera.Nombre as Carrera') //inner join tabla relacionada por id
            ->fetchAll();
    }

    public function Actualizar($data){
        $id = $data['id'];
        unset($data['id']); // sacar del array de campos a actualizar

        $this->db->update($this->table, $data, $id)
            //->update($this->table)->where('pkname',$id)
            ->execute();
    }

    public function Registrar($data) {
        $this->db->insertInto($this->table, $data)
            ->execute();
    }

    public function Eliminar($id) {
        $this->db->deleteFrom($this->table, $id)
            //->deleteFrom($this->table)->where('pkname',$id)
            ->execute();
    }

}