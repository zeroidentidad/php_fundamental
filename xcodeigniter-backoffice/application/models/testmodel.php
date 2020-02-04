<?php
class TestModel extends CI_Model{
    public function getAll($l = 10, $p = 0){
        return RestApi::call(
            RestApiMethod::GET,
            "test/empleado/listar/$l/$p"
        );
    }
    
    public function insert($data){
        return RestApi::call(
            RestApiMethod::POST,
            'test/empleado/registrar',
            $data
        );
    }
}