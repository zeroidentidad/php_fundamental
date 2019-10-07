<?php

include("Crawler.php");

$consulta = new Crawler();

if($consulta->esCrawler($_SERVER['HTTP_USER_AGENT'])){
	echo 'Esto es un crawler';
}else{
	echo 'Esto es un ser humano';
	echo '<br/>';
	echo 'Información USER AGENT: '.$_SERVER['HTTP_USER_AGENT'];
	$fp = fopen('robots.txt','r');
	$contenido = fgets($fp);
	$contenido++;
	fclose($fp);
	
	$fp2 = fopen('robots.txt','w');
	fputs($fp2,$contenido);
	fclose($fp2);
	
	
	$fp3 = fopen('robots.txt','r');
	$contenido2 = fgets($fp3);
	echo '<br>Nueva cifra: '.$contenido2;	
}

?>