<?php

namespace BenchmarkRouting\Symfony;

use BenchmarkRouting\Benchmark;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\PhpFileLoader;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use PhpBench\Attributes as Bench;
use Symfony\Component\Routing\Router;

#[Bench\Groups(['symfony', 'raw'])]
final class Symfony extends Benchmark
{
    public function runRouting(string $route): array
    {
        $router = new Router(new PhpFileLoader(new FileLocator(__DIR__ . '/../../routes/')), 'symfony-routes.php');

        return $router->match($route);
    }
}
