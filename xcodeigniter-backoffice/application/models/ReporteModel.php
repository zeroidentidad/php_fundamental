<?php
class ReporteModel extends CI_Model{
    public function topEmpleado(){
        return RestApi::call(
            RestApiMethod::GET,
            "reporte/topEmpleado"
        );
    }

    public function topProducto(){
        return RestApi::call(
            RestApiMethod::GET,
            "reporte/topProducto"
        );
    }

    public function ventaMensual(){
        return RestApi::call(
            RestApiMethod::GET,
            "reporte/ventaMensual"
        );
    }
}