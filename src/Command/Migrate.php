<?php
declare(strict_types=1);

namespace mdantas\PhinxWrap\Command;


use mdantas\PhinxWrap\AbstractCommandConstructor;

class Migrate extends \Phinx\Console\Command\Migrate
{
    use AbstractCommandConstructor;
}