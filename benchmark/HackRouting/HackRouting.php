<?php

namespace BenchmarkRouting\HackRouting;

use BenchmarkRouting\Benchmark;
use HackRouting\HttpMethod;
use HackRouting\Router;
use PhpBench\Attributes as Bench;

#[Bench\Groups(['hack-routing', 'raw'])]
final class HackRouting extends Benchmark
{
    public function runRouting(string $route): array
    {
        $router = $this->loadedRoutes();

        return $router->match(HttpMethod::GET, $route)[0];
    }

    public function loadedRoutes(): Router
    {
        return include __DIR__ . '/../../routes/hack-routes.php';
    }
}
