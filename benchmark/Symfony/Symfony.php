<?php

namespace BenchmarkRouting\Symfony;

use BenchmarkRouting\Benchmark;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use PhpBench\Attributes as Bench;

#[Bench\Groups(['symfony', 'raw'])]
final class Symfony extends Benchmark
{
    public function runRouting(string $route): array
    {
        $matcher = new UrlMatcher(
            $this->loadedRoutes(),
            new RequestContext()
        );

        return $matcher->match($route);
    }

    public function loadedRoutes(): RouteCollection
    {
        return include __DIR__ . '/../../routes/symfony-routes.php';
    }
}
