<?php
//chmod('./data.txt', 0777); //<- en linux, si no hay permisos en nuevo archivo
 
$file_contents = file_get_contents('data.txt'); // <=

?>
<!DOCTYPE html>
<html class=" whatinput-types-initial whatinput-types-keyboard">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<title>Leyendo TXT</title>
<link rel="stylesheet" href="../assets/css/foundation.css">
<link rel="stylesheet" href="../assets/css/app.css">
<meta class="foundation-mq">
</head>
  <body>
    <div class="top-bar">
      <div class="row">
        <div class="top-bar-left">
          <ul class="dropdown menu" data-dropdown-menu="tckp8q-dropdown-menu" role="menubar">
            <li role="menuitem">PHP: Archivos</li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Top Bar -->
    <br>
    <div class="row">
      <div class="medium-12 large-12 columns">
        <h4>Leyendo TXT</h4>
          
        <div class="medium-12  columns">
            <div class="callout primary">
              <pre><?php echo $file_contents; ?></pre>
            </div>
        </div>

          <div class="medium-12  columns">
            <table>
              <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
              </tr>

              <?php
              $arr_lines = explode("\n", $file_contents);
              //separación por lineas a un array
              foreach ($arr_lines as $line) {
                  $arr_colums = explode(',', $line);
                  //separación de cada nueva linea por cada caracter de separación
              ?>

              <tr>
                <td><?php echo $arr_colums[0]; ?></td>
                <td><?php echo $arr_colums[1]; ?></td>
                <td><?php echo $arr_colums[2]; ?></td>
              </tr>

              <?php
              }
              ?>
              
            </table>
          </div>
      </div>
    </div>

    <!-- Footer -->
    <div class="row column">
      <hr>
      <ul class="menu">
        <li class="float-right">PHP</li>
      </ul>
    </div>

  </body>
</html>