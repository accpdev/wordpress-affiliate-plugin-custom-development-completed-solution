<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit778900de3169515db2c2c0cbc5ce3b63
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/../..' . '/lib',
            1 => __DIR__ . '/../..' . '/tests',
            2 => __DIR__ . '/../..' . '/tests/Stripe',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit778900de3169515db2c2c0cbc5ce3b63::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit778900de3169515db2c2c0cbc5ce3b63::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
