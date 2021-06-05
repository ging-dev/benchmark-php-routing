<?php

namespace BenchmarkRouting\HackRouting;

use BenchmarkRouting\Benchmark;
use HackRouting\BaseRouter;
use HackRouting\Cache\MemoryCache;
use HackRouting\HttpMethod;
use PhpBench\Attributes as Bench;

#[Bench\Groups(['hack-routing', 'instance'])]
final class HackRoutingInstance extends Benchmark
{
    protected BaseRouter $router;

    public function __construct()
    {
        $cache = new MemoryCache();

        $this->router = include __DIR__ . '/../../routes/hack-routes.php';

        // trigger caching.
        $this->router->getResolver();
    }

    public function runRouting(string $route): array
    {
        return ['_route' => $this->router->routeMethodAndPath(HttpMethod::GET, $route)[0]];
    }
}
