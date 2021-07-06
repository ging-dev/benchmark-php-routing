<?php

namespace BenchmarkRouting\HackRouting;

use BenchmarkRouting\Benchmark;
use HackRouting\AbstractMatcher;
use HackRouting\BaseRouter;
use HackRouting\Cache\MemoryCache;
use HackRouting\HttpMethod;
use HackRouting\Router;
use PhpBench\Attributes as Bench;

#[Bench\Groups(['hack-routing', 'instance'])]
final class HackRoutingInstance extends Benchmark
{
    protected Router $router;

    public function __construct()
    {
        $cache = new MemoryCache();

        $this->router = include __DIR__ . '/../../routes/hack-routes.php';

        // warmup
        $this->benchAll();
    }

    /**
     * @throws \HackRouting\HttpException\MethodNotAllowedException
     * @throws \HackRouting\HttpException\InternalServerErrorException
     * @throws \HackRouting\HttpException\NotFoundException
     */
    public function runRouting(string $route, string $method = 'GET'): array
    {
        return $this->router->match($method, $route)[0];
    }
}
