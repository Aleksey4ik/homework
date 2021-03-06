<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3dcd1f8fd0fc54080ea4bdec3c73e15e
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MyProject\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MyProject\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3dcd1f8fd0fc54080ea4bdec3c73e15e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3dcd1f8fd0fc54080ea4bdec3c73e15e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3dcd1f8fd0fc54080ea4bdec3c73e15e::$classMap;

        }, null, ClassLoader::class);
    }
}
