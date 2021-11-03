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
$container = new SimpleContainer();
$service = new MySuperCoolService();

$container->set(MySuperCoolService::class, $service);
```

### Fetching from the container

``` php
if ($container->has(MySuperCoolService::class) {
    $service = $container->get(MySuperCoolService::class);
}
```

### Adding a callable definition

Here we are adding an anonymous function which will be invoked the first time the definition is accessed via `set()`.
The computed value will be cached for subsequent accesses.

``` php
$container = new SimpleContainer();

$container->set('myCallable', function() {
    return 'a computed value';
});

$value = $container->get('myCallable');
// value is 'a computed value'
```

### Invoking the callable for every access

If you require the callable to be invoked every time you access the definition, you can use the `resolve()` method instead.

``` php
$value = $container->resolve('myCallable');
// value is 'a computed value'
```


## License

The MIT License (MIT). Please see the [License File](https://github.com/NetoECommerce/simple-container/blob/master/LICENSE) for more information.
