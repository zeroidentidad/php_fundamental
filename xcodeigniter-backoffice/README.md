
## Config base url:

    - File: /application/config/config.php

    - Ref: 
```php
    $config['base_url'] = 'http://localhost/xcodeigniter-backoffice/';
```


## Config api url:

    - File: /application/libraries/RestApi.php

    - Ref: 
```php
    RestApi::initialize(
        'http://localhost/xslim-api-pedidos/public/',
        'APP-TOKEN'
    );
```