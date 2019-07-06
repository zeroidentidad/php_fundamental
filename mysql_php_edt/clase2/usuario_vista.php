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

     //$usuario->insertar($datos);
    ?>
    <h3>R: Consultar</h3>
    <?php
      $consulta = $usuario->consultar();
      //var_dump($consulta);
      foreach ($consulta as $valor) {
          echo '<table border="1">
                <tr>
                <th>Nombre</th><th>A. Pat.</th><th>A. Mat.</th><th>Email</th>
                </tr> 
                <tr>
                <td>'.$valor["nombre"].'</td><td>'.$valor["paterno"].'</td><td>'.$valor["materno"].'</td><td>'.$valor["email"].'</td>
                </tr>
                </table>';
      }
    ?>
</body>
</html>