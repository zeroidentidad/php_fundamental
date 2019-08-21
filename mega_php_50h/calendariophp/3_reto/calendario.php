<?

function ultimoDia($mes,$anio){
	$ultimo_dia = 28;
	while(checkdate($mes,$ultimo_dia + 1,$anio)){
		$ultimo_dia++;
	}
	return $ultimo_dia;
}

function calendar_html(){
	$meses = array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	//$fecha_fin=date('d-m-Y', time());
	$mes = date('m',time());
	$anio = date('Y',time());
	?>
    <!-- Código HTML -->
    <table>
    	<tr>
        	<td colspan="4">
            	<select id="calendar_mes" onChange="update_Calendar()"> 
    <!-- Fin Código HTML -->
    <? 
		$mes_numero = 1;
		while($mes_numero<=12){
			if($mes_numero == $mes){
				echo "<option value=".$mes_numero." selected='selected'>".$meses[$mes_numero-1]."</option>\n";
			}else{
				echo "<option value=".$mes_numero.">".$meses[$mes_numero-1]."</option>\n";
			}
			$mes_numero++;
		}
		?>
         <!-- Código HTML -->
        </select>
       </td>
       <td colspan="3">
       	<select id="calendar_anio" onChange="update_Calendar()">
         <!-- Fin Código HTML -->
        <?
		//años a mostrar
		$anio_min = $anio - 30;
		$anio_max = $anio; //año actual
		while($anio_max >= $anio_min){
			echo "<option value=".$anio_max.">".$anio_max."</option> \n";
			$anio_max--;
		}
		?>
        <!-- Código HTML -->
        </select>
       </td>
      </tr>
      </table>
      <div id="calendario_dias">
      <? calendar($mes,$anio)?>
      </div>
        <!-- Fin Código HTML -->
        <?

}

function calendar($mes,$anio){

$meses = array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

//Calcular el primer día de la seman
$diaSemana = date("w",mktime(0,0,0,$mes,1,$anio));
//Calcular el último día del mes
$ultimoDiaMes = date("d",(mktime(0,0,0,$mes+1,1,$anio)-1));
$diaActual = date("j");	
	?>
	<table id="calendario">
	<caption><?php echo $meses[$mes-1].' '.$anio?></caption>
    <tr>
    	<th>Lun</th><th>Mar</th><th>Mier</th><th>Jue</th><th>Vie</th><th>Sáb</th><th>Dom</th>
    </tr>
    <tr>
    <?
		
		$last_cell = $diaSemana+$ultimoDiaMes;
		for($i=1;$i<=42;$i++){
			
			if($i==$diaSemana){
				//establecemos el día que empieza
				$day = 1;
			}
			
			if($i<$diaSemana || $i>=$last_cell){
				echo "<td></td>";
			}else{
				if($day == $diaActual){
					echo "<td class='hoy'><a style=\"display:block; cursor:pointer\" onClick=\"set_date('".$anio."-".$mes."-".$day."')\">".$day."</a></td>";
				}else{
					echo "<td><a style=\"display:block; cursor:pointer\" onClick=\"set_date('".$anio."-".$mes."-".$day."')\">".$day."</a></td>";	
				}
				$day++;
			}
				//cuando llega al final de la semana, iniciamos una columna nueva
				if($i%7==0){
					echo "</tr><tr>\n";
				}
			
			
		}
	
	?>
    </tr>
</table>
<?

}
?>








