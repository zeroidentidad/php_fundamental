<!DOCTYPE html>
<html data-whatinput="keyboard" data-whatintent="keyboard" class=" whatinput-types-initial whatinput-types-keyboard"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        <title>Imagenes</title>
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
        <h4>Imagenes</h4>
      </div>
    </div>

    <div class="row">
      <div class="medium-12 large-12 columns">
        <div class="callout primary">
          <?php
          $contador = file_get_contents('counter.txt');
          settype($contador, 'integer');
          for ($i=0; $i <=$contador; $i++) { 
          ?>
          <img height="250" width="250" src="./show_image.php" /> <!-- imagen con php -->
          <?php
          }
          ?>
        </div>
      </div>
    </div>

    <div class="row column">
      <hr>
      <ul class="menu">
        <li class="float-right">PHP</li>
      </ul>
    </div>

    </body>
</html>