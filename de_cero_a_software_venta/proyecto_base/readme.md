<h1>Arquitectura base proyecto de curso</h1>
<h2>PHP 7: cero hasta crear software de venta</h2>

<h3>¿Qué contiene el proyecto?</h3>

<h4>Carga automática (PSR-4)</h4>
Mediante composer para que las clases sean cargadas automáticamente

<h4>Routing</h4>
<b>PHpRoute</b> permite manejar las rutas de nuestro proyecto trabajando con controladores
https://github.com/mrjgreen/phroute

<h4>Template</h4>
Twig: Para el tema de las vistas, layout, template se trabajo con Twig
http://twig.sensiolabs.org/

<h4>Persistencia</h4>
<b>Eloquent ORM</b> se uso el package de Eloquent ORM para trabajar persistencia, consultas a la base de datos.
https://packagist.org/packages/illuminate/database

<h4>Validaciones</h4>
<b>Respect Validation</b> entre todos los packages vistos, se optó por usar Respect Validation que pareció bastante sencillo usar y tiene una gran cantidad de validaciones.
https://packagist.org/packages/respect/validation

<h1>IMPORTANTE:</h1>
Volver a hacer la autocarga de las clases al descargar repo con: 'composer dump-autoload -o'