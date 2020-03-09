# Simple Container for PHP

Extremely basic and fast implementation of the PSR-11 container standard.
It's not intended to do fancy dependency injection, just the absolute bare minimum.
Consider using PHP-DI or Symfony DI for a more complete implementation.

## Install

Via Composer

``` bash
$ composer require netolabs/simple-container
```

## Requirements

PHP version 7.3 and up is required.

## Usage

### Adding a definition to the container

``` php
$container = new SimpleContiner();
$service = new MySuperCoolService();

$container->add(MySuperCoolService::class, $service);
```

### Fetching from the container

``` php
if ($container->has(MySuperCoolService::class) {
    $service = $container->get(MySuperCoolService::class);
}
```

## License

The MIT License (MIT). Please see the [License File](https://github.com/NetoECommerce/simple-container/blob/master/LICENSE) for more information.