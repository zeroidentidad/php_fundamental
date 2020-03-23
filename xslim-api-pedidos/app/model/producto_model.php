<?php

namespace App\Model;

use App\Lib\Response;

class ProductoModel
{
    private $db;
    private $table = 'producto';
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
            ->orderBy('id DESC')
            ->fetchAll();

        $total = $this->db->from($this->table)
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
        $this->db->insertInto($this->table, $data)
            ->execute();

        return $this->response->SetResponse(true);
    }

    public function actualizar($data, $id)
    {
        $this->db->update($this->table, $data, $id)
            ->execute();

        return $this->response->SetResponse(true);
    }

    public function eliminar($id)
    {
        $this->db->deleteFrom($this->table, $id)
            ->execute();

        return $this->response->SetResponse(true);
    }

    public function todo()
    {
        return $this->db->from($this->table)
            ->orderBy('Nombre DESC')
            ->fetchAll();
    }    
}
