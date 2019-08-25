<?php

if( $_POST )
{

  $title = isset( $_POST['title'] ) ? $_POST['title'] : '';
  $name = isset( $_POST['name'] ) ? $_POST['name'] : '';
  $last_name = isset( $_POST['last_name'] ) ? $_POST['last_name'] : '';

  $string_output = $title . ',' . $name . ',' . $last_name;
  file_put_contents('./data.txt', $string_output);

}

$file_contents = file_get_contents('./data.txt'); // ->

?>
<!DOCTYPE html>
<html data-whatinput="keyboard" data-whatintent="keyboard" class=" whatinput-types-initial whatinput-types-keyboard"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<title>Escribiendo archivo</title>
<link rel="stylesheet" href="../assets/css/foundation.css">
<link rel="stylesheet" href="../assets/css/app.css">
<meta class="foundation-mq"></head>
  <body>

    <!-- Top Bar -->
    <div class="top-bar">
      <div class="row">
        <div class="top-bar-left">
          <ul class="dropdown menu" data-dropdown-menu="tckp8q-dropdown-menu" role="menubar">
            <li role="menuitem">PHP: Archivos</li>
          </ul>
        </div>
      </div>
    </div>

    <br>
  
    <div class="row">
      <div class="medium-12 large-12 columns">
        <h4>Escribiendo archivo</h4>
        <form method="POST">
          <div class="medium-4  columns">
            <label>Titulo</label>
            <select name="title">
              <option>C.</option>
              <option>Lic.</option>
              <option>Mtro.</option>
              <option>Doc.</option>
            </select>
          </div>
          <div class="medium-4  columns">
            <label>Nombre</label>
            <input type="text" name="name">
          </div>
          <div class="medium-4  columns">
            <label>Apellido</label>
            <input type="text" name="last_name">
          </div>
          <div class="medium-12  columns">
            <input value="Enviar" class="button success hollow" type="submit">
          </div>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="medium-12  columns">
        <div class="medium-12  columns">
            <table>
              <tr>
                <th>Titulo</th>
                <th>Nombre</th>
                <th>Apellido</th>
              </tr>

            <?php
            $arr_lines = explode("\n",$file_contents); //<-

            if ($arr_lines[0]!=''){
              foreach( $arr_lines as $line )
              {
                $arr_colums = explode(',', $line);
              ?>
              <tr>
                <td><?php echo $arr_colums[0]; ?></td>
                <td><?php echo $arr_colums[1]; ?></td>
                <td><?php echo $arr_colums[2]; ?></td>
              </tr>
              <?php
              }
            }
              ?>
              
            </table>
      </div>
    </div>

    <div class="row column">
      <hr>
      <ul class="menu">
        <li class="float-right">PHP</li>
      </ul>
    </div>

        <script src="../assets/js/vendor/jquery.js"></script>
        <script src="../assets/js/vendor/what-input.js"></script>
        <script src="../assets/js/vendor/foundation.js"></script>
        <script src="../assets/js/app.js"></script>
    </body>
</html>