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
