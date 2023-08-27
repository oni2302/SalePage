<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb66140f6b2e5c03b664987262f2ccf7e
{
    public static $prefixLengthsPsr4 = array (
        'Z' => 
        array (
            'Zalo\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Zalo\\' => 
        array (
            0 => __DIR__ . '/..' . '/zaloplatform/zalo-php-sdk/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb66140f6b2e5c03b664987262f2ccf7e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb66140f6b2e5c03b664987262f2ccf7e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb66140f6b2e5c03b664987262f2ccf7e::$classMap;

        }, null, ClassLoader::class);
    }
}
