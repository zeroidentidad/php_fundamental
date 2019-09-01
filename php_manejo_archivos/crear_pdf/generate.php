<?php

require_once './vendor/autoload.php';

$mpdf = new \mPDF();

$content = file_get_contents('./content.html');
$mpdf->WriteHTML( $content );
$mpdf->Output();