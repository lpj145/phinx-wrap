<?php
declare(strict_types=1);

namespace mdantas\PhinxWrap\Command;


use mdantas\PhinxWrap\AbstractCommandConstructor;

class Status extends \Phinx\Console\Command\Status
{
    use AbstractCommandConstructor;
}