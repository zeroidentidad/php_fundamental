
## Config script sql data base:

    - File: /sql/dbase.sql

## Config data base src:

    - File: /src/settings.php

    - Ref: 
```php
        // Configuración de mi APP
        'app_token_name'   => 'APP-TOKEN',
        'connectionString' => [
            'dns'  => 'mysql:host=localhost;dbname=dbpedidos;charset=utf8',
            'user' => 'remoto',
            'pass' => 'x1234567'
        ]  
```

## Config composer vendor:

    - File: /composer.json

    - Ref: composer install
```json
    "require": {
        "php": ">=5.5.0",
        "slim/slim": "~3.0",
        "slim/php-view": "^2.0",
        "monolog/monolog": "^1.17",
        "firebase/php-jwt": "3.*",
        "lichtner/fluentpdo": "1.1.*"
    }
```