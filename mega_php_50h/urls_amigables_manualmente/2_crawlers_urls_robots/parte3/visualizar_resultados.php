<?php
	
		$fp3 = fopen('robots.txt','r');
		$resultado = fgets($fp3);
		echo '<br>Total Visitas Robots: '.$resultado;
		
		$fp4 = fopen('humanos.txt','r');
		$resultado2 = fgets($fp4);
		echo '<br>Total Visitas Humanos: '.$resultado2;

?>