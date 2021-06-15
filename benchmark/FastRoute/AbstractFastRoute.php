<?php

namespace BenchmarkRouting\FastRoute;

use BenchmarkRouting\Benchmark;
use FastRoute\RouteCollector;

use function FastRoute\cachedDispatcher;
use function FastRoute\simpleDispatcher;

abstract class AbstractFastRoute extends Benchmark
{
    protected string $dataGeneratorClass;
    protected string $dispatcherClass;
    protected ?string $cacheKey = null;
    protected ?string $cacheDriver = null;

    public function runRouting(string $route): array
    {
        if ($this->cacheKey && $this->cacheDriver) {
            $dispatcher = cachedDispatcher(
                [$this, 'loadRoutes'],
                [
                'dataGenerator' => $this->dataGeneratorClass,
                'dispatcher' => $this->dispatcherClass,
                'cacheDriver' => $this->cacheDriver,
                'cacheKey' => $this->cacheKey,
                ]
            );
        } else {
            $dispatcher = simpleDispatcher(
                [$this, 'loadRoutes'],
                [
                'dataGenerator' => $this->dataGeneratorClass,
                'dispatcher' => $this->dispatcherClass
                ]
            );
        }

        return $dispatcher->dispatch('GET', $route)[1];
    }

    public function loadRoutes(RouteCollector $routes): void
    {
        include __DIR__ . '/../../routes/fastroute-routes.php';
    }
}
