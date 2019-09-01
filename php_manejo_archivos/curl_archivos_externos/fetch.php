<?php

require 'vendor/autoload.php';

$client = new \GuzzleHttp\Client();

$res = $client->request('GET', 'http://localhost:8001/data.txt');
//$res = $client->request('GET', 'http://localhost:8001/export.pptx');

//header('Content-Type: '. $res->getHeaderLine('content-type') ); // para imagen

//header('Content-Disposition: attachment; filename=new_file.pptx'); // pptx

echo $res->getBody();