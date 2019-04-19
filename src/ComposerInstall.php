<?php
declare(strict_types=1);

namespace mdantas\PhinxWrap;

use Composer\Installer\PackageEvent;
use Composer\Script\Event;

class ComposerInstall
{
    public static function postPackageInstall(PackageEvent $event)
    {
        $vendorPath = $event->getComposer()->getConfig()->get('vendor-dir');
        $envFilePath = $vendorPath.'/../.env';
        $envString = '';
        $packagePath = $vendorPath.'/mdantas/src';

        if (false === file_exists($packagePath.'EnvTemplate.php')) {
            $packagePath = $vendorPath.'/../src';
        }

        if (file_exists($envFilePath)) {
            $envString = file_get_contents($envFilePath);
            unlink($envFilePath);
        }
        $envString .= require $packagePath.'/EnvTemplate.php';
        file_put_contents($envFilePath, $envString);
    }
}