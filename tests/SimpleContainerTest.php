<?php declare(strict_types=1);

namespace Neto\Container\Test;

use Neto\Container\NotFoundException;
use Neto\Container\SimpleContainer;
use PHPUnit\Framework\TestCase;

class SimpleContainerTest extends TestCase
{

    public function testContainerCanCheckForDefinition()
    {
        $container = new SimpleContainer();

        $this->assertFalse($container->has('definition'));

        $container->set('definition', 'value');

        $this->assertTrue($container->has('definition'));
    }

    public function testContainerCanAddAndGetDefinition()
    {
        $container = new SimpleContainer();
        $container->set('definition', 'value');

        $this->assertEquals('value', $container->get('definition'));
    }

    public function testContainerThrowsWhenDefinitionIsNotFound()
    {
        $this->expectException(NotFoundException::class);

        $container = new SimpleContainer();
        $container->get('non-existent-definition');
    }
}
