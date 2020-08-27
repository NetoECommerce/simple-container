<?php declare(strict_types=1);

namespace Neto\Container;

use Psr\Container\ContainerInterface;

trait ContainerAwareTrait
{
    /** @var ContainerInterface|null */
    private $container;

    /**
     * Sets a PSR-compliant container.
     *
     * @param ContainerInterface $container
     * @return $this
     */
    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;
        return $this;
    }

    /**
     * @return ContainerInterface|null
     */
    public function getContainer(): ?ContainerInterface
    {
        return $this->container;
    }
}
