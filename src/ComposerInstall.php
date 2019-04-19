<?php
declare(strict_types=1);

namespace mdantas\PhinxWrap;

use Composer\Composer;
use Composer\Installer\PackageEvent;
use Composer\Script\Event;

class ComposerInstall
{
    public static function postPackageInstall(PackageEvent $event)
    {
        $envPath = static::getEnvPath($event->getComposer());
        $packagePath = static::getPackagePath($event->getComposer());
        static::puthEnvTemplate($envPath, $packagePath);
    }

    public static function postAutoloadDump(Event $event)
    {
        $envPath = static::getEnvPath($event->getComposer());
        $packagePath = static::getPackagePath($event->getComposer());
        static::puthEnvTemplate($envPath, $packagePath);
    }

    public static function postInstallCmd(Event $event)
    {
        $envFilePath = static::getEnvPath($event->getComposer());
        $packagePath = static::getPackagePath($event->getComposer());

        self::puthEnvTemplate($envFilePath, $packagePath);
    }

    private static function puthEnvTemplate($envFilePath, $packagePath)
    {
        $envString = '';
        if (file_exists($envFilePath)) {
            $envString = file_get_contents($envFilePath);
            unlink($envFilePath);
        }
        $envString .= static::getEnvTemplate($packagePath);
        file_put_contents($envFilePath, $envString);
    }

    private static function getEnvTemplate($packagePath)
    {
        return require $packagePath.'/EnvTemplate.php';
    }

    private static function getPackagePath(Composer $composer)
    {
        $vendorPath = $composer->getConfig()->get('vendor-dir');
        $packagePath = $vendorPath.'/mdantas/src';

        if (false === file_exists($packagePath.'EnvTemplate.php')) {
            $packagePath = $vendorPath.'/../src';
        }
        return $packagePath;
    }

    private static function getEnvPath(Composer $composer)
    {
        return $composer->getConfig()->get('vendor-dir').'/../.env';
    }
}