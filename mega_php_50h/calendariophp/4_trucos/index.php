<?php
require_once("calendario.php");
?>
<!doctype html>
<html><head>
<meta charset="UTF-8">
<title>Calendario Ajax</title>
<script src="./jquery-1.12.4.min.js" type="text/javascript"></script>
<script type="text/javascript" src="./funciones.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div align="center">
<form id="formulario">
	<br/>
	<label for="fecha">Seleccionar fecha:</label>
    <input type="text" name="fecha" id="fecha"/>
    <a onClick="show_calendar()" style="cursor:pointer">[<u>Calendario</u>]</a>
    <div id="calendario">
    <?php calendar_html(); ?>
    </div>
</form>
</div>
</body>
</html>