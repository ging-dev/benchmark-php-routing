<?php

namespace BenchmarkRouting\Symfony;

use BenchmarkRouting\Benchmark;
use PhpBench\Attributes as Bench;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\PhpFileLoader;
use Symfony\Component\Routing\Router;

#[Bench\Groups(['symfony', 'raw'])]
final class Symfony extends Benchmark
{
    public function runRouting(string $route, string $method = 'GET'): array
    {
        $router = new Router(new PhpFileLoader(new FileLocator(__DIR__.'/../../routes/')), 'symfony-routes.php');
        $router->getContext()->setMethod($method);

        return $router->match($route);
    }
}
