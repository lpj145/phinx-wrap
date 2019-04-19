<?php
declare(strict_types=1);

namespace mdantas\PhinxWrap\Command;


use mdantas\PhinxWrap\AbstractCommandConstructor;

class Test extends \Phinx\Console\Command\Test
{
    use AbstractCommandConstructor;
}