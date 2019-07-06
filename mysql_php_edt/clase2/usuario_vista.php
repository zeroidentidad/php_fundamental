<?php
require_once "usuario_modelo.php";
$usuario = new Usuario_modelo();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Usuarios</title>
</head>
<body>
    <h1>CRUD Usuarios</h1>
    <h3>C: Insertar</h3>
    <?php
     $datos = [
         "nombre"=>"Jesus",
         "paterno"=>"Ferrer",
         "materno"=>"Sanchez",
         "email"=>"test@mail.com"
     ];

     $usuario->insertar($datos);
    ?>
</body>
</html>