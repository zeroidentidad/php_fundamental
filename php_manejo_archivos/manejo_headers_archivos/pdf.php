<?php

header('Content-Type: application/pdf');
echo file_get_contents('simple.pdf');