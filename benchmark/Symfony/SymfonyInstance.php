<?php

namespace BenchmarkRouting\Symfony;

use BenchmarkRouting\Benchmark;
use Symfony\Component\Routing\Matcher\CompiledUrlMatcher;
use Symfony\Component\Routing\Matcher\Dumper\CompiledUrlMatcherDumper;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use PhpBench\Attributes as Bench;

#[Bench\Groups(['symfony', 'instance'])]
final class SymfonyInstance extends Benchmark
{
    protected CompiledUrlMatcher $matcher;

    public function __construct()
    {
        $dumper = new CompiledUrlMatcherDumper($this->loadedRoutes());
        $compiled = $dumper->getCompiledRoutes();
        $this->matcher = new CompiledUrlMatcher($compiled, new RequestContext());

        // warmup.
        $this->benchAll();
    }

    public function runRouting(string $route): array
    {
        return $this->matcher->match($route);
    }

    public function loadedRoutes(): RouteCollection
    {
        return include __DIR__ . '/../../routes/symfony-routes.php';
    }
}
