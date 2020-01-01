<?php

// Cargar dependencias
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/app/lib/database.php';
require __DIR__ . '/app/model/usermodel.php';

use App\Model\UserModel;

$um = new UserModel();

var_dump($um->Listar());

//var_dump($um->Obtener(5));

/*$um->Registrar([
    'Carrera_id' => 2,
    'Nombre' => 'Duplicado eliminar',        
    'Apellido' => 'Ferrer',        
    'Sexo' => 1,        
    'FechaNacimiento' => '1926-08-26',
    'FechaRegistro' => date('Y-m-d'),        
    'Foto' => '123455454-zero.png',        
    'Correo' => 'mail@gmail.com'     
]);*/

/*$um->Actualizar([
    'id'=> 5,
    'Carrera_id' => 4,
    'Nombre' => 'Ana',
    'Correo' => 'mail@gmail.com'
]);*/

//$um->Eliminar(8);