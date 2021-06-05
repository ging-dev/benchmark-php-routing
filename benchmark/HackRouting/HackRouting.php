<?php

namespace BenchmarkRouting\HackRouting;

use BenchmarkRouting\Benchmark;
use HackRouting\BaseRouter;
use HackRouting\HttpMethod;
use PhpBench\Attributes as Bench;

#[Bench\Groups(['hack-routing', 'raw'])]
final class HackRouting extends Benchmark
{
    public function runRouting(string $route): array
    {
        $router = $this->loadedRoutes();

        return ['_route' => $router->routeMethodAndPath(HttpMethod::GET, $route)[0]];
    }

    public function loadedRoutes(): BaseRouter
    {
        $cache = null;
        return include __DIR__ . '/../../routes/hack-routes.php';
    }
}
