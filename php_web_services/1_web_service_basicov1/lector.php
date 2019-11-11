<?php

$archivo  = 'http://phpdocs.local/php_fundamental/php_web_services/0_web_service_basicov1/index.php';
$content = file($archivo);
$reading = $content[0];
echo $reading;
