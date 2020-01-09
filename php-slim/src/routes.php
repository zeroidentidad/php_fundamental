<?php
// Routes

$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // test ejemplo
    var_dump($this->ejemplo);

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

// rutas agrupadas
$app->group('/users', function () {
    $this->get('/getAll', function ($request, $response, $args) {
        //return 'Todos los users';
        
        //var_dump($request->getHeaders());
        //var_dump($request->getHeader('HTTP_USER_AGENT'));

        //return $response->withStatus(500);

        $usuarios=[
           ['Nombre'=>'Jesus', 'user' => 'zeroidentidad'],
           ['Nombre'=>'Vero', 'user' => 'vero3ar'],
        ];

        return $response->withHeader('Content-type', 'application/json')
        ->write(json_encode($usuarios));
    });

    $this->get('/get/{id:[0-9]+}', function ($request, $response, $args) {
        return 'Get usuario ' . $args['id'];
    });

    $this->post('/insert', function ($request, $response, $args) {
        //return 'Nuevo usuario creado';
        var_dump($request->getParsedBody());
        var_dump($request->getParsedBody()['nombre']);
    });

    $this->put('/update', function ($request, $response, $args) {
        return 'Usuario actualizado';
    });

    $this->delete('/delete/{id:[0-9]+}', function ($request, $response, $args) {
        return 'Delete usuario ' . $args['id'];
    });

    $this->any('/index', function ($request, $response, $args) {
        return 'Mediante cualquier metodo';
    });
})->add(new ExampleMiddleware());


// rutas aisladas
$app->get('/dogs/getAll', function ($request, $response, $args) {
    return 'Todos los dogs';
})->add(function ($request, $response, $next) { //closure middleware (ruta/grupo)
    $response->getBody()->write('BEFORE');
    $response = $next($request, $response);
    $response->getBody()->write('AFTER');

    return $response;
});

$app->get('/dogs/get/{id:[0-9]+}', function ($request, $response, $args) {
    return 'Get perro '.$args['id'];
});

$app->post('/dogs/insert', function ($request, $response, $args) {
    return 'Nuevo perro creado';
});

$app->put('/dogs/update', function ($request, $response, $args) {
    return 'Perro actualizado';
});

$app->delete('/dogs/delete/{id:[0-9]+}', function ($request, $response, $args) {
    return 'Delete perro '.$args['id'];
});

$app->any('/dogs/index', function ($request, $response, $args) {
    return 'Mediante cualquier metodo';
});