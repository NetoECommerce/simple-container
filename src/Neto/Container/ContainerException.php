<?php declare(strict_types=1);

namespace Neto\Container;

use RuntimeException;
use Psr\Container\ContainerExceptionInterface;

class ContainerException extends RuntimeException implements ContainerExceptionInterface
{
}
