<?php declare(strict_types=1);

namespace Neto\Container\Test;

use Neto\Container\ContainerException;
use Neto\Container\NotFoundException;
use Neto\Container\SimpleContainer;
use PHPUnit\Framework\TestCase;

final class SimpleContainerTest extends TestCase
{
    protected $container;

    public function setUp()
    {
        $this->container = new SimpleContainer();
    }

    public function testContainerCanCheckForDefinition()
    {
        $this->assertFalse($this->container->has('definition'));

        $this->container->set('definition', 'value');

        $this->assertTrue($this->container->has('definition'));
    }

    public function testContainerCanAddAndGetDefinition()
    {
        $this->container->set('definition', 'value');

        $this->assertEquals('value', $this->container->get('definition'));
    }

    public function testContainerThrowsWhenDefinitionIsNotFound()
    {
        $this->expectException(NotFoundException::class);

        $this->container->get('non-existent-definition');
    }

    public function testContainerCanResolveDefinition()
    {
        $this->container->set('callable', function () {
            return 'foo';
        });

        $this->assertEquals('foo', $this->container->resolve('callable'));
    }

    public function testContainerThrowsWhenResolvingNonCallable()
    {
        $this->expectException(ContainerException::class);

        $this->container->set('callable', 'not a callable value');
        $this->container->resolve('callable');
    }
}
