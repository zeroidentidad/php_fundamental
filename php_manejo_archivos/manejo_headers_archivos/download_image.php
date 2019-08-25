<?php

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=example.jpg');
echo file_get_contents('attractions.jpg');