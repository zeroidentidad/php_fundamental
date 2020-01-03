<?php
require_once 'vendor/autoload.php';
require __DIR__ . '/app/lib/auth.php';

use Firebase\JWT\JWT,
    App\Lib\Auth;

//var_dump(new Auth());

/*echo Auth::SignIn([
    'id' => 1,
    'name' => 'Zero'
]);*/

$token='eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJleHAiOjE1NzgwODczNTIsImF1ZCI6ImYzNTU2MDk4NzNmMDMyOWRjYzU4MTBjYThjZWUxODgwOTFkMjM5M2QiLCJkYXRhIjp7ImlkIjoxLCJuYW1lIjoiWmVybyJ9fQ.DQhh785YYRl6DR_Ys8n7aktkAIo_an4Nm22va2DVSOA';

var_dump(
    Auth::GetData(
        $token
    )
);


// == test simple init == 
/*
$time = time();
$key = 'my_secret_key';
$token = array(
    'iat' => $time, // Tiempo en que inició el token
    'exp' => $time + (60), // (60*60) Tiempo en que expirará el token (+1 hora)
    'data' => [ // información del usuario
        'id' => 1,
        'name' => 'Zero',
        'email' => 'test@mail.com'
    ]
);
*/

/*
$jwt = JWT::encode($token, $key);
var_dump($jwt);
*/

/*
$jwt = '0123.abc.def';
$data = JWT::decode($jwt, $key, array('HS256'));
var_dump($data);
*/