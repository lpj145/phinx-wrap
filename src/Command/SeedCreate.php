<?php
declare(strict_types=1);

namespace mdantas\PhinxWrap\Command;


use mdantas\PhinxWrap\AbstractCommandConstructor;

class SeedCreate extends \Phinx\Console\Command\SeedCreate
{
    use AbstractCommandConstructor;
}