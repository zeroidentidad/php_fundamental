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
});
