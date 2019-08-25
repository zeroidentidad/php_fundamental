<?php

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=example.zip');
echo file_get_contents('simple.pdf.zip');