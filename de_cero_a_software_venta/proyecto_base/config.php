<?php
return [
    /* Database access */
    'database' => [
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'base_software_venta',
        'username'  => 'remoto',
        'password'  => 'x1234567',
        'charset'   => 'utf8',
        'collation' => 'utf8_spanish_ci',
        'prefix'    => '',
    ],

    /* Session configuration */
    'session-time' => 10, // hours
    'session-name' => 'application-auth',

    /* Secret key */
    'secret-key' => '@asd9ws.w6*',

    /* Environment */
    'environment' => 'dev', // Options: dev, prod, stop

    /* Timezone */
    'timezone' => 'America/Mexico_City',

    /* Cache */
    'cache' => false
];