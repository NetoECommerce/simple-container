<?php declare(strict_types=1);

namespace Neto\Container;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * Class SimpleContainer
 *
 * This is a simple implementation of the PSR-11 container standard.
 * It's not intended to do fancy DI, just the absolute bare minimum.
 * Consider using PHP-DI or Symfony DI for a more complete implementation.
 *
 * @package Neto\Container
 */
class SimpleContainer implements ContainerInterface
{
    /** @var array */
    private $container = [];

    /**
     * Adds an entry to the container with an identifier.
     *
     * @param string $id
     * @param mixed $value
     *
     * @return void
     */
    public function add($id, $value)
    {
        $this->container[$id] = $value;
    }

    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @throws NotFoundExceptionInterface  No entry was found for this identifier.
     * @throws ContainerExceptionInterface Error while retrieving the entry.
     *
     * @return mixed Entry.
     */
    public function get($id)
    {
        if ($this->has($id)) {
            return $this->container[$id];
        }

        throw new NotFoundException(sprintf('Could not find container definition for %s', $id));
    }

    /**
     * Returns true if the container can return an entry for the given identifier.
     * Returns false otherwise.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return bool
     */
    public function has($id)
    {
        return isset($this->container[$id]);
    }
}
