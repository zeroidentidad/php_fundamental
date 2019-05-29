<?php
// Auth Filter
$router->filter('auth', function(){
    \App\Middlewares\AuthMiddleware::isLoggedIn();
});

// System Role Permission
$router->filter('isAdmin', function(){
    if(!\App\Middlewares\RoleMiddleware::isAdmin()){
        \App\Helpers\UrlHelper::redirect('');
    };
});

$router->filter('isSeller', function(){
    if(!\App\Middlewares\RoleMiddleware::isSeller()){
        \App\Helpers\UrlHelper::redirect('');
    };
});

$router->filter('isAnalyst', function(){
    if(!\App\Middlewares\RoleMiddleware::isAnalyst()){
        \App\Helpers\UrlHelper::redirect('');
    };
});