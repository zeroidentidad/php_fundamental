<?php
class PedidoModel extends CI_Model
{

    public function listar($l, $p)
    {
        return RestApi::call(
            RestApiMethod::GET,
            "pedido/listar/$l/$p"
        );
    }

    public function obtener($id)
    {
        return RestApi::call(
            RestApiMethod::GET,
            "pedido/obtener/$id"
        );
    }
}
