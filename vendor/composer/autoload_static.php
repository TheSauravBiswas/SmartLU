<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb36b810059ae213bbf9478ff5491b499
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb36b810059ae213bbf9478ff5491b499::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb36b810059ae213bbf9478ff5491b499::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb36b810059ae213bbf9478ff5491b499::$classMap;

        }, null, ClassLoader::class);
    }
}
