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
     * @param string $identifier
     * @param mixed $value
     *
     * @return void
     */
    public function set($identifier, $value)
    {
        $this->container[$identifier] = $value;
    }

    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param string $identifier Identifier of the entry to look for.
     *
     * @throws NotFoundExceptionInterface  No entry was found for this identifier.
     * @throws ContainerExceptionInterface Error while retrieving the entry.
     *
     * @return mixed Entry.
     */
    public function get($identifier)
    {
        if (!$this->has($identifier)) {
            throw new NotFoundException(sprintf('Could not find container definition for %s', $identifier));
        }

        if (is_callable($this->container[$identifier])) {
            $this->container[$identifier] = $this->resolve($identifier);
        }

        return $this->container[$identifier];
    }

    /**
     * @param string $identifier Identifier to resolve.
     *
     * @throws NotFoundExceptionInterface  No entry was found for this identifier.
     * @throws ContainerExceptionInterface Container value is not a callable.
     *
     * @return mixed Value of the invoked callable
     */
    public function resolve($identifier)
    {
        if (!$this->has($identifier)) {
            throw new NotFoundException(sprintf('Could not find container definition for %s', $identifier));
        }

        if (!is_callable($this->container[$identifier])) {
            throw new ContainerException(sprintf('Cannot resolve non-callable definition %s', $identifier));
        }

        return call_user_func($this->container[$identifier]);
    }

    /**
     * Returns true if the container can return an entry for the given identifier.
     * Returns false otherwise.
     *
     * @param string $identifier Identifier of the entry to look for.
     *
     * @return bool
     */
    public function has($identifier)
    {
        return isset($this->container[$identifier]);
    }
}
