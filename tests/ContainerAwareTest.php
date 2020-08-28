<?php declare(strict_types=1);

namespace Neto\Container\Test;

use Neto\Container\ContainerAwareTrait;
use Phake;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

final class ContainerAwareTest extends TestCase
{
    public function testTraitGetsAndSetsContainer()
    {
        $trait = $this->getMockForTrait(ContainerAwareTrait::class);
        $container = Phake::mock(ContainerInterface::class);

        $trait->setContainer($container);
        $this->assertSame($container, $trait->getContainer());
    }

    public function testTraitCanGetNullContainer()
    {
        $trait = $this->getMockForTrait(ContainerAwareTrait::class);
        $this->assertNull($trait->getContainer());
    }
}
