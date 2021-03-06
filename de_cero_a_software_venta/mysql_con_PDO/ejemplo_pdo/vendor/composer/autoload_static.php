<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit76714c38118f354cf535a751eba829f2
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'App\\Controllers\\HomeController' => __DIR__ . '/../..' . '/app/controllers/HomeController.php',
        'App\\Controllers\\UserController' => __DIR__ . '/../..' . '/app/controllers/UserController.php',
        'App\\Models\\Empleado' => __DIR__ . '/../..' . '/app/models/Empleado.php',
        'App\\Models\\Profesion' => __DIR__ . '/../..' . '/app/models/Profesion.php',
        'Core\\Database' => __DIR__ . '/../..' . '/core/Database.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit76714c38118f354cf535a751eba829f2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit76714c38118f354cf535a751eba829f2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit76714c38118f354cf535a751eba829f2::$classMap;

        }, null, ClassLoader::class);
    }
}
