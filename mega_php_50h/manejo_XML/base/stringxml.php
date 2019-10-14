<?php

$string = '<usuarios>
	<usuario>
		<nombre>Mónica</nombre>
		<apellidos>Gutiérrez López</apellidos>
		<direccion>Calle Madrid, 23</direccion>
		<ciudad>Badajoz</ciudad>
		<pais>España</pais>
		<contacto>
			<telefono>1234567</telefono>
			<url>http://monicagutierrez.com</url>
			<email>monicagutierrez@gmail.com</email>
		</contacto>
	</usuario>
	<usuario>
		<nombre>Alfredo</nombre>
		<apellidos>Tapia Sánchez</apellidos>
		<direccion>Calle Puerto Rico, 12</direccion>
		<ciudad>Santiago</ciudad>
		<pais>España</pais>
		<contacto>
			<telefono>222222002</telefono>
			<url>http://alfredotapia.com</url>
			<email>alfredotapia@gmail.com</email>
		</contacto>
	</usuario>
</usuarios>';

$dom = new DOMDocument;
$dom->loadXML($string);
$sce = simplexml_import_dom($dom);

echo $sce->usuario[0]->ciudad.chr(10);
echo $sce->usuario[0]->pais;

?>







