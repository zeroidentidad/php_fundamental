<?php

namespace App\Model;

use App\Lib\Response;

class PedidoModel
{
    private $db;
    private $table = 'pedido';
    private $response;

    public function __CONSTRUCT($db)
    {
        $this->db = $db;
        $this->response = new Response();
    }
    public function guardar($data)
    {
        //cabecera
        $pedido_id = $this->db->insertInto($this->table, [
            'Estado_id' => 0,
            'Cliente' => $data['Cliente'],
            'Empleado_id' => $data['Empleado_id'],
            'Total' =>  $data['Total'], // no podemos asumir que es correta
            'Fecha' => date('y-m-d'),
        ])->execute();

        //insertar detalle
        foreach ($data['Detalle'] as $d) {

            $this->db->insertInto('pedido_detalle', [
                'Pedido_id' => $pedido_id,
                'Producto_id' => $d['Producto_id'],
                'Cantidad' => $d['Cantidad'],
                'PrecioUnitario' => $d['PrecioUnitario'],
                'Total' => $d['Total'],
            ])->execute();
        }

        return $this->response->SetResponse(true);
    }

    public function listarPorEmpleado($empleado_id)
    {
        return $this->db->from($this->table)
            ->where('Empleado_id', $empleado_id)
            ->innerJoin("tabla_de_tablas tt ON relacion = 'pedido_estado' AND tt.id = pedido.Estado_id")
            ->select('pedido.*, empleado.Nombre Empleado, tt.Valor Estado')
            ->orderBy('id DESC')
            ->fetchAll();
    }

    public function listar($l, $p)
    {
        $data = $this->db->from($this->table)
            ->innerJoin("tabla_de_tablas tt ON relacion = 'pedido_estado' AND tt.id = pedido.Estado_id")
            ->select('pedido.*, empleado.Nombre Empleado, tt.Valor Estado')
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
        // Cabecera del pedido
        $row = $this->db->from($this->table, $id)
            ->innerJoin("tabla_de_tablas tt ON relacion = 'pedido_estado' AND tt.id = pedido.Estado_id")
            ->select('pedido.*, empleado.Nombre Empleado, tt.Valor Estado')
            ->fetch();

        // Detalle pedido
        $row->{'Detalle'} = $this->db->from('pedido_detalle')
            ->select('pedido_detalle.*, producto.Nombre Producto, producto.Imagen Imagen')
            ->where('pedido_id', $id)
            ->fetchAll();

        return $row;
    }

    public function actualizaEstado($pedido_id, $estado_id)
    {
        // Cabecera del pedido
        $this->db->update($this->table, ['Estado_id' => $estado_id], $pedido_id)
            ->execute();

        return $this->response->SetResponse(true);
    }
    
    public function estados()
    {
        // Cabecera del pedido
        return  $this->db->from('tabla_de_tablas')
            ->where('relacion', 'pedido_estado')
            ->orderBy('orden')
            ->fetchAll();
    }
}
