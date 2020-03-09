<?php declare(strict_types=1);

namespace Neto\Container;

use RuntimeException;
use Psr\Container\NotFoundExceptionInterface;

class NotFoundException extends RuntimeException implements NotFoundExceptionInterface
{
}
