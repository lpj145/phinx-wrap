<?php

namespace mdantas\PhinxWrap;

use PHPUnit\Framework\TestCase;

class ConsoleApplicationTest extends TestCase
{
    public function testConstruct()
    {
        $this->assertInstanceOf(ConsoleApplication::class, new ConsoleApplication(\ConfigArray::getConfig('phinxConfig')));
    }
}
