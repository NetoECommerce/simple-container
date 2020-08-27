<?php declare(strict_types=1);

namespace Neto\Container;

use Psr\Container\ContainerInterface;

/**
 * Class ContainerAwareInterface
 *
 * This interface should be implemented by classes that utilise a PSR-compliant container.
 *
 * @package Neto\Container
 */
interface ContainerAwareInterface
{
    /**
     * Sets the container property.
     *
     * @param ContainerInterface $container
     * @return mixed
     */
    public function setContainer(ContainerInterface $container);

    /**
     * Gets the container property.
     *
     * @return ContainerInterface|null
     */
    public function getContainer(): ?ContainerInterface;
}
