<?php
//definimos los valores iniciales
$mes = date("n");
$anio = date("Y");
$diaActual = date("j");

//Calcular el primer día de la semanana
$diaSemana = date("w",mktime(0,0,0,$mes,1,$anio));
//Calcular el último día del mes
$ultimoDiaMes = date("d",(mktime(0,0,0,$mes+1,1,$anio)-1));

$meses = array (1=>"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Calendario</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<h1>Calendario PHP</h1>
<table id="calendario">
	<caption><?php echo $meses[$mes].' '.$anio?></caption>
    <tr>
    	<th>Lun</th><th>Mar</th><th>Mier</th><th>Jue</th><th>Vie</th><th>Sáb</th><th>Dom</th>
    </tr>
    <tr>
    <?php
		$last_cell = $diaSemana+$ultimoDiaMes;
		for($i=1;$i<=42;$i++){
			
			if($i==$diaSemana){
				//establecemos el día que empieza
				$dia = 1;
			}
			
			if($i<$diaSemana || $i>=$last_cell){
				echo "<td>&nbsp;</td>";
			}else{
				if($dia == $diaActual){
					echo "<td class='hoy'>$dia</td>";
				}else{
					echo "<td>$dia</td>";	
				}
				$dia++;
			}
				//cuando llega al final de la semana, iniciamos una columna nueva
				if($i%7==0){
					echo "</tr><tr>\n";
				}
		}
	?>
    </tr>
</table>
</body>
</html>