<?php

namespace BenchmarkRouting\FastRoute;

use BenchmarkRouting\Benchmark;
use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

abstract class AbstractFastRouteInstance extends Benchmark
{
    protected string $dataGeneratorClass;
    protected string $dispatcherClass;
    private Dispatcher $dispatcher;

    public function __construct()
    {
        $this->dispatcher = simpleDispatcher(
            [$this, 'loadRoutes'],
            [
            'dataGenerator' => $this->dataGeneratorClass,
            'dispatcher' => $this->dispatcherClass,
            ]
        );

        // warmup.
        $this->benchAll();
    }

    public function runRouting(string $route, string $method = 'GET'): array
    {
        return $this->dispatcher->dispatch($method, $route)[1];
    }

    public function loadRoutes(RouteCollector $routes): void
    {
        include __DIR__.'/../../routes/fastroute-routes.php';
    }
}
