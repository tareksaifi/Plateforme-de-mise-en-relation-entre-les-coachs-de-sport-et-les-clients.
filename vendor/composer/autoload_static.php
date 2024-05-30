<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7e1932a696af4b2edd1b6feeaf734517
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit7e1932a696af4b2edd1b6feeaf734517::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7e1932a696af4b2edd1b6feeaf734517::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7e1932a696af4b2edd1b6feeaf734517::$classMap;

        }, null, ClassLoader::class);
    }
}
