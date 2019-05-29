<?php
/* Controllers */

$router->group(['before' => 'auth'], function($router){

$router->controller('/home', 'App\\Controllers\\HomeController');

$router->group(['before' => 'isSeller'], function($router){
    $router->controller('/cliente', 'App\\Controllers\\ClienteController');
    $router->controller('/comprobante', 'App\\Controllers\\ComprobanteController');
    $router->controller('/producto', 'App\\Controllers\\ProductoController');
});    

$router->group(['before' => 'isAnalyst'], function($router){
    $router->controller('/reporte', 'App\\Controllers\\ReporteController');
});

$router->group(['before' => 'isAdmin'], function($router){
    $router->controller('/usuario', 'App\\Controllers\\UsuarioController');
});

});

$router->controller('/auth', 'App\\Controllers\\AuthController');

$router->get('/', function(){
    if(!\Core\Auth::isLoggedIn()){
        \App\Helpers\UrlHelper::redirect('auth');
    } else {
        \App\Helpers\UrlHelper::redirect('home');
    }
});

$router->get('/welcome', function(){
    return 'Welcome page';
}, ['before' => 'auth']);

$router->get('/test', function(){
    return 'Welcome page';
}, ['before' => 'auth']);