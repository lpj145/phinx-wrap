<?php
declare(strict_types=1);

namespace mdantas\PhinxWrap\Command;


use mdantas\PhinxWrap\AbstractCommandConstructor;

class Rollback extends \Phinx\Console\Command\Rollback
{
    use AbstractCommandConstructor;
}