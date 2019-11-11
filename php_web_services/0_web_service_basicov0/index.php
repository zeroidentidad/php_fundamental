<?php

	$curl = curl_init("http://phpdocs.local/php_fundamental/php_web_services/0_web_service_basicov0/base.txt");

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	$respuesta = curl_exec($curl);
	$info = curl_getinfo($curl);

	if ($info['http_code']==200) {
		$datos = explode(",",$respuesta);
		echo "<h1>Mercancia disponible</h1>";

		foreach($datos as $mercancia){
			echo "-> ".$mercancia."<br>";
		}
	}else {
		echo "Error: ".curl_error($curl);
	}