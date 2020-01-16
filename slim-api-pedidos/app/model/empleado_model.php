<?php

namespace App\Model;

use App\Lib\Response;

class EmpleadoModel
{
    private $db;
    private $table = 'empleado';
    private $response;

    public function __CONSTRUCT($db)
    {
        $this->db = $db;
        $this->response = new Response();
    }

    public function listar($l, $p)
    {
        $data = $this->db->from($this->table)
            ->limit($l)
            ->offset($p)
            ->orderBy('id')
            ->fetchAll();

        $total = $this->db->from($this->table)
            ->select(null)
            ->select('COUNT(*) Total')
            ->fetch()
            ->Total;

        return [
            'data'  => $data,
            'total' => $total
        ];
    }

    public function obtener($id)
    {
        return $this->db->from($this->table, $id)
            ->fetch();
    }

    public function registrar($data)
    {
        $data['Password'] = md5($data['Password']);

        $this->db->insertInto($this->table, $data)
            ->execute();

        return $this->response->SetResponse(true);
    }

    public function actualizar($data, $id)
    {
        $data['Password'] = md5($data['Password']);

        $this->db->update($this->table, $data, $id)
            ->execute();
            
        return $this->response->SetResponse(true);
    }

    public function eliminar($id)
    {
        $this->db->deletefrom($this->table, $id)
            ->execute();

        return $this->response->SetResponse(true);
    }
}
