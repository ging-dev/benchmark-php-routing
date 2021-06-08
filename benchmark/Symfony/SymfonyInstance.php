<?php

namespace BenchmarkRouting\Symfony;

use BenchmarkRouting\Benchmark;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Loader\FileLoader;
use Symfony\Component\Routing\Loader\PhpFileLoader;
use Symfony\Component\Routing\Matcher\CompiledUrlMatcher;
use Symfony\Component\Routing\Matcher\Dumper\CompiledUrlMatcherDumper;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use PhpBench\Attributes as Bench;
use Symfony\Component\Routing\Router;

#[Bench\Groups(['symfony', 'instance'])]
final class SymfonyInstance extends Benchmark
{
    protected Router $router;

    public function __construct()
    {
        $this->router = new Router(new PhpFileLoader(new FileLocator(__DIR__ . '/../../routes/')), 'symfony-routes.php');
        
        // warmup.
        $this->benchAll();
    }

    public function runRouting(string $route): array
    {
        return $this->router->match($route);
    }
}
