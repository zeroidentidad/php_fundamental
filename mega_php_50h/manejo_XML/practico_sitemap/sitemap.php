<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Sitemap</title>
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>
<section>
<h1>Sitemap</h1>
<?php
	if(!$xml = simplexml_load_file('sitemap.xml')){
		echo 'No se ha podido cargar el XML';
	}else{
		foreach ($xml as $url){
			echo '<article>';
			echo '<h2><a href="'.$url->loc.'">'.$url->titulo.'</a></h2>';
			echo '<h3>'.$url->autor.'</h3>';
			echo 'Última Modificación: <span> '.$url->lastmode.'</span> | ';
			echo 'Frecuencia: <span> '.$url->changefreq.'</span><br/>';
			echo 'Prioridad: <span> '.$url->priority.'<br/>';
			echo '</article>';
		}
	}
?>
</section>
</body>
</html>