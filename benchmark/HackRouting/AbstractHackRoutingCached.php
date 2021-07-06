<?php

namespace BenchmarkRouting\HackRouting;

use BenchmarkRouting\Benchmark;
use HackRouting\Cache\CacheInterface;
use HackRouting\HttpMethod;
use HackRouting\Router;

abstract class AbstractHackRoutingCached extends Benchmark
{
    protected ?CacheInterface $cache;

    /**
     * @throws \HackRouting\HttpException\MethodNotAllowedException
     * @throws \HackRouting\HttpException\InternalServerErrorException
     * @throws \HackRouting\HttpException\NotFoundException
     */
    public function runRouting(string $route, string $method = 'GET'): array
    {
        $matcher = $this->loadedRoutes($this->cache);

        return $matcher->match($method, $route)[0];
    }

    public function loadedRoutes(CacheInterface $cache = null): Router
    {
        return include __DIR__ . '/../../routes/hack-routes.php';
    }
}
