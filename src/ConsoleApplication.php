<?php
declare(strict_types=1);

namespace mdantas\PhinxWrap;

use mdantas\PhinxWrap\Command\Create;
use mdantas\PhinxWrap\Command\Init;
use mdantas\PhinxWrap\Command\Migrate;
use mdantas\PhinxWrap\Command\Rollback;
use mdantas\PhinxWrap\Command\SeedCreate;
use mdantas\PhinxWrap\Command\SeedRun;
use mdantas\PhinxWrap\Command\Status;
use mdantas\PhinxWrap\Command\Test;
use Phinx\Config\ConfigInterface;
use Phinx\Console\PhinxApplication;

class ConsoleApplication extends PhinxApplication
{
    public function __construct(ConfigInterface $config, $version = null)
    {
        parent::__construct($version);

        $this->addCommands([
            new Create($config),
            new Status($config),
            new Migrate($config),
            new Rollback($config),
            new SeedCreate($config),
            new SeedRun($config),
            new Test($config),
        ]);
    }
}