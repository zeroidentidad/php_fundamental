<?php
use App\Lib\Auth,
    App\Lib\Response,
    App\Validation\TestValidation,
    App\Middleware\AuthMiddleware;

$app->group('/test/', function () {
    $this->get('', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'text/html')
                   ->write('Soy una ruta de prueba');
    });
    
    $this->get('empleado/listar/{l}/{p}', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                   ->write(json_encode($this->model->test->getAll($args['l'], $args['p'])));
    });
    
    $this->post('empleado/registrar', function ($req, $res, $args) {
        return $res->withHeader('Content-type', 'application/json')
                   ->write(json_encode($this->model->test->insert($req->getParsedBody())));
    });
    
    $this->post('valida', function ($req, $res, $args) {
        $r = TestValidation::validate($req->getParsedBody());
        
        if(!$r->response){
            return $res->withHeader('Content-type', 'application/json')
                       ->withStatus(422)
                       ->write(json_encode($r->errors));            
        }
        
        return $res->withHeader('Content-type', 'application/json')
                   ->write(json_encode($this->model->test->getAll()));
    });
    
    $this->get('auth', function ($req, $res, $args) {
        $token = Auth::SignIn([
            'Nombre' => 'Eduardo',
            'Correo' => 'eduardo@anexsoft.com',
            'Imagen' => null
        ]);
        
        $res->write($token);
    });
    
    $this->get('auth/validate', function ($req, $res, $args) {
        $res->write('OK');
    })->add(new AuthMiddleware($this));
});