<?php
declare(strict_types=1);

namespace mdantas\PhinxWrap\Command;


use mdantas\PhinxWrap\AbstractCommandConstructor;

class SeedRun extends \Phinx\Console\Command\SeedRun
{
    use AbstractCommandConstructor;
}