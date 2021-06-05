<?php

namespace BenchmarkRouting\HackRouting;

use BenchmarkRouting\Benchmark;
use HackRouting\BaseRouter;
use HackRouting\Cache\CacheInterface;
use HackRouting\HttpMethod;

abstract class AbstractHackRoutingCached extends Benchmark
{
    protected ?CacheInterface $cache;

    public function runRouting(string $route): array
    {
        $router = $this->loadedRoutes($this->cache);

        return ['_route' => $router->routeMethodAndPath(HttpMethod::GET, $route)[0]];
    }

    public function loadedRoutes(CacheInterface $cache = null): BaseRouter
    {
        return include __DIR__ . '/../../routes/hack-routes.php';
    }
}
