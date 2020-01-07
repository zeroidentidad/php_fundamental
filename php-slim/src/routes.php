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
        return 'Todos los users';
    });

    $this->get('/get/{id:[0-9]+}', function ($request, $response, $args) {
        return 'Get usuario ' . $args['id'];
    });

    $this->post('/insert', function ($request, $response, $args) {
        return 'Nuevo usuario creado';
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
});

// rutas aisladas
$app->get('/dogs/getAll', function ($request, $response, $args) {
    return 'Todos los dogs';
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