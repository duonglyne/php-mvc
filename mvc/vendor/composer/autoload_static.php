<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit33acebcd958b8cb246435e8d87113529
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'AHT\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'AHT\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit33acebcd958b8cb246435e8d87113529::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit33acebcd958b8cb246435e8d87113529::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
