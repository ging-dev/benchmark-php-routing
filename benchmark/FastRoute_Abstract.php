<?php

namespace Benchmark_Routing;

use FastRoute\RouteCollector;
use function FastRoute\cachedDispatcher;
use function FastRoute\simpleDispatcher;

abstract class FastRoute_Abstract extends Benchmark
{
    protected $dataGeneratorClass;
    protected $dispatcherClass;
    protected $cache_file = null;

    function runRouting(string $route): array
    {
        if ($this->cache_file) {
            $dispatcher = cachedDispatcher(
                [$this, 'loadRoutes'], [
                'dataGenerator' => $this->dataGeneratorClass,
                'dispatcher' => $this->dispatcherClass,
                'cacheFile' => $this->cache_file
            ]);
        } else {
            $dispatcher = simpleDispatcher(
                [$this, 'loadRoutes'], [
                'dataGenerator' => $this->dataGeneratorClass,
                'dispatcher' => $this->dispatcherClass
            ]);
        }

        return $dispatcher->dispatch('GET', $route)[1];
    }

    function loadRoutes(RouteCollector $routes)
    {
        include __DIR__ . '/fastroute-routes.php';
    }
}
