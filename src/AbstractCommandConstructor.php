<?php
namespace mdantas\PhinxWrap;

use Phinx\Config\ConfigInterface;

/**
 * Trait AbstractCommandConstructor
 * @package mdantas\PhinxWrap
 * @method \Phinx\Console\Command\AbstractCommand setConfig(\Phinx\Config\ConfigInterface $config)
 * @property ConfigInterface $config;
 */
trait AbstractCommandConstructor
{
    public function __construct(ConfigInterface $config, string $name = null)
    {
        parent::__construct($name);
        $this->config = $config;
        $this->setConfig($config);
    }
}