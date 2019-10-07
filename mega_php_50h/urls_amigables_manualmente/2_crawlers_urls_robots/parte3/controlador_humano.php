<?php

include("Crawler.php");

$consulta = new Crawler();

$consulta->esCrawler($_SERVER['HTTP_USER_AGENT']);

?>