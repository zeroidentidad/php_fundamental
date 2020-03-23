<?php

use App\Lib\Auth,
    App\Lib\Response,
    App\Validation\ProductoValidation,
    App\Middleware\AuthMiddleware;

$app->group('/producto/', function () {
    $this->get('listar/{l}/{p}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
            ->write(
                json_encode($this->model->producto->listar($args['l'], $args['p']))
            );
    });

    $this->get('todo', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
            ->write(
                json_encode($this->model->producto->todo())
            );
    });

    $this->get('obtener/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
            ->write(
                json_encode($this->model->producto->obtener($args['id']))
            );
    });

    $this->post('registrar', function ($req, $res, $args) {
        $r = ProductoValidation::validate($req->getParsedBody());

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                ->withStatus(422)
                ->write(json_encode($r->errors));
        }

        return $res->withHeader('Content-type', 'application/json')
            ->write(
                json_encode($this->model->producto->registrar($req->getParsedBody()))
            );
    });

    $this->put('actualizar/{id}', function ($req, $res, $args) {
        $r = ProductoValidation::validate($req->getParsedBody(), true);

        if (!$r->response) {
            return $res->withHeader('Content-type', 'application/json')
                ->withStatus(422)
                ->write(json_encode($r->errors));
        }

        return $res->withHeader('Content-type', 'application/json')
            ->write(
                json_encode($this->model->producto->actualizar($req->getParsedBody(), $args['id']))
            );
    });

    $this->delete('eliminar/{id}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
            ->write(
                json_encode($this->model->producto->eliminar($args['id']))
            );
    });
})->add(new AuthMiddleware($app));
