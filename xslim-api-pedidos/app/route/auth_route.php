<?php

use App\Lib\Auth,
    App\Lib\Response,
    App\Validation\EmpleadoValidation,
    App\Middleware\AuthMiddleware;

$app->group('/auth/', function () {
    $this->get('', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'text/html')
            ->write('test ruta');
    });

    $this->post('autenticar', function ($req, $res, $args) {

        $parametros = $req->getParsedBody();

        return $res->withHeader('Content-type', 'application/json')
            ->write(json_encode($this->model->auth->autenticar($parametros['Correo'], $parametros['Password'])));
    });
});
