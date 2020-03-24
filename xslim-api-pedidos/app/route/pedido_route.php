<?php

use App\Lib\Auth,
    App\Lib\Response,
    App\Validation\PedidoValidation,
    App\Middleware\AuthMiddleware;

$app->group('/pedido/', function () {
    $this->get('listarPorEmpleado/{empleado_id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
            ->write(
                json_encode($this->model->pedido->listarPorEmpleado($args['empleado_id']))
            );
    });

    $this->get('listar/{l}/{p}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
            ->write(
                json_encode($this->model->pedido->listar($args['l'], $args['p']))
            );
    });

    $this->get('obtener/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
            ->write(
                json_encode($this->model->pedido->obtener($args['id']))
            );
    });

    $this->get('estados', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
            ->write(
                json_encode($this->model->pedido->estados())
            );
    });

    $this->put('estado/{id}', function ($req, $res, $args) {
        $data = $req->getParsedBody();

        return $res->withHeader('Content-type', 'application/json')
            ->write(
                json_encode($this->model->pedido->actualizaEstado($args['id'], $data['Estado_id']))
            );
    });

    $this->post('guardar', function ($req, $res, $args) {
        $data = $req->getParsedBody();

        $r = PedidoValidation::validate($data);

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                ->withStatus(422)
                ->write(json_encode($r->errors));
        }

        return $res->withHeader('Content-type', 'application/json')
            ->write(
                json_encode($this->model->pedido->guardar($data))
            );
    });

    $this->options('/{routes:.+}', function ($request, $response, $args) {
        return $response;
    });

    $this->add(function ($req, $res, $next) {
        $response = $next($req, $res);
        return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization, app-token')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    });

})->add(new AuthMiddleware($app));