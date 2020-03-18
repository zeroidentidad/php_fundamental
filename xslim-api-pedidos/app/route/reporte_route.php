<?php
use App\Lib\Auth,
    App\Lib\Response,
    App\Validation\UsuarioValidation,
    App\Middleware\AuthMiddleware;

$app->group('/reporte/', function () {
    $this->get('topEmpleado', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
            ->write(
                json_encode($this->model->reporte->topEmpleado())
            );
    });

    $this->get('topProducto', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
            ->write(
                json_encode($this->model->reporte->topProducto())
            );
    });

    $this->get('ventaMensual', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
            ->write(
                json_encode($this->model->reporte->ventaMensual())
            );
    });    
    
})->add(new AuthMiddleware($app));