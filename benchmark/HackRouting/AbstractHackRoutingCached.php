<?php

namespace BenchmarkRouting\HackRouting;

use BenchmarkRouting\Benchmark;
use HackRouting\AbstractMatcher;
use HackRouting\Cache\CacheInterface;
use HackRouting\HttpMethod;

abstract class AbstractHackRoutingCached extends Benchmark
{
    protected ?CacheInterface $cache;

    /**
     * @throws \HackRouting\HttpException\MethodNotAllowedException
     * @throws \HackRouting\HttpException\InternalServerErrorException
     * @throws \HackRouting\HttpException\NotFoundException
     */
    public function runRouting(string $route): array
    {
        $matcher = $this->loadedRoutes($this->cache);

        return $matcher->match(HttpMethod::GET, $route)[0];
    }

    public function loadedRoutes(CacheInterface $cache = null): AbstractMatcher
    {
        return include __DIR__ . '/../../routes/hack-routes.php';
    }
}
