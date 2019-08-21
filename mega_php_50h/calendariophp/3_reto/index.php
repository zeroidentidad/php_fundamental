<?php
require("calendario.php");
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Mi Calendario con Ajax</title>
<style>
	*{
		margin:0;
		bottom:0;
	}
	body{
		font-family:Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
	}
	#calendario{
		font-size:1em;
	}
	#calendario caption{
		text-align:left;
		padding:5px 10px;
		background:rgba(19,163,76,1.00);
		color:#fff;
	}
	#calendario th{
		background-color: rgba(221,238,190,1.00);
		color:rgba(18,133,79,1.00);
		width:40px;
		font-weight:lighter;
	}
	#calendario td{
		text-align:right;
		padding:2px 5px;
		background-color:silver;
	}
	#calendario .hoy{
		background-color:rgba(241,180,110,1.00);
	}
</style>
</head>

<body>
<form id="formulario">
	<label for="fecha">Selecciona la fecha</label>
    <input type="text" name="fecha" id="fecha"/>
    <a onClick="show_calendar()">
    (Calendario)</a>
    <div id="calendario">
    <?php calendar_html()?>
    </div>
</form>
</body>
</html>