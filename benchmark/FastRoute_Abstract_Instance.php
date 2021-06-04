<?php

namespace Benchmark_Routing;

use FastRoute\RouteCollector;
use function FastRoute\cachedDispatcher;
use function FastRoute\simpleDispatcher;

abstract class FastRoute_Abstract_Instance extends Benchmark
{
    protected $dataGeneratorClass;
    protected $dispatcherClass;
    private $dispatcher;

    public function __construct()
    {
        $this->dispatcher = $dispatcher = simpleDispatcher(
            [$this, 'loadRoutes'], [
            'dataGenerator' => $this->dataGeneratorClass,
            'dispatcher' => $this->dispatcherClass
        ]);
    }

    function runRouting(string $route): array
    {
        return $this->dispatcher->dispatch('GET', $route)[1];
    }

    function loadRoutes(RouteCollector $routes)
    {
        include __DIR__ . '/fastroute-routes.php';
    }
}
