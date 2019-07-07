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
         "nombre"=>"Antonio",
         "paterno"=>"Ferrer",
         "materno"=>"Sanchez",
         "email"=>"test2@mail.com"
     ];

     //$usuario->insertar($datos);
    ?>
    <h3>R: Consultar</h3>
    <table border="1">
    <tr>
    <th>Nombre</th><th>A. Pat.</th><th>A. Mat.</th><th>Email</th>
    </tr> 
    <?php
      $consulta = $usuario->consultar();
      //var_dump($consulta);
      foreach ($consulta as $valor) {
          echo '<tr>
                <td>'.$valor["nombre"].'</td><td>'.$valor["paterno"].'</td><td>'.$valor["materno"].'</td><td>'.$valor["email"].'</td>
                </tr>';
      }
    ?>
    </table>
    <h3>U: Actualizar</h3>
    <?php
     $datos = [
         "nombre"=>"Jesús",
         "paterno"=>"Ferrer",
         "materno"=>"Sanchez",
         "email"=>"correochido@mail.com",
         "id"=>1
     ];

     //$usuario->actualizar($datos);
    ?>
    <h3>D: Eliminar</h3>
    <?php
     $id = 8;
     $usuario->eliminar('', $id);   
    ?>
</body>
</html>