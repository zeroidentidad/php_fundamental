<?php

sleep(2); // simulación carga recursos

?>
<!DOCTYPE html>
<html data-whatinput="keyboard" data-whatintent="keyboard" class=" whatinput-types-initial whatinput-types-keyboard"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<title>Cache</title>
<link rel="icon" type="image/x-icon" href="favicon.ico" />
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
        <h4>Cache Random =>: <?php echo rand(); ?></h4>
        <a href="./index_generator.php" class="button success" >Generar cache HTML</a>
        <br />
        <a href="./json.php" class="button warning" >JSON</a>
        <a href="./xml.php" class="button success" >XML</a>
        <a href="./pdf.php" class="button secondary" >PDF</a>
        <a href="./download_zip.php" class="button alert" >ZIP</a>
        <a href="./download_image.php" class="button radius" >Imagen</a>
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