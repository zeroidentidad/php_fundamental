<?php

define('ENV','dev');

define('DB', array(
    'dsn'=>(ENV=='dev')?'mysql:host=localhost;dbname=ticketsdev':'',
    'user'=>(ENV=='dev')?'remoto':'',
    'pass'=>(ENV=='dev')?'x1234567':''
));