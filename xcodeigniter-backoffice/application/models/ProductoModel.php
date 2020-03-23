<?php
class ProductoModel extends CI_Model
{

    public function listar($l, $p)
    {
        return RestApi::call(
            RestApiMethod::GET,
            "producto/listar/$l/$p"
        );
    }

    public function obtener($id)
    {
        return RestApi::call(
            RestApiMethod::GET,
            "producto/obtener/$id"
        );
    }

    public function registrar($data)
    {
        return RestApi::call(
            RestApiMethod::POST,
            "producto/registrar",
            $data
        );
    }

    public function actualizar($data, $id)
    {
        return RestApi::call(
            RestApiMethod::PUT,
            "producto/actualizar/$id",
            $data
        );
    }

    public function eliminar($id)
    {
        return RestApi::call(
            RestApiMethod::DELETE,
            "producto/eliminar/$id"
        );
    }
}
