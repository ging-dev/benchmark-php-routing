<?php

namespace BenchmarkRouting\Symfony;

use BenchmarkRouting\Benchmark;
use PhpBench\Attributes as Bench;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\PhpFileLoader;
use Symfony\Component\Routing\Router;

#[Bench\Groups(['symfony', 'instance'])]
final class SymfonyInstance extends Benchmark
{
    protected Router $router;

    public function __construct()
    {
        $this->router = new Router(new PhpFileLoader(new FileLocator(__DIR__.'/../../routes/')), 'symfony-routes.php');

        // warmup.
        $this->benchAll();
    }

    public function runRouting(string $route, string $method = 'GET'): array
    {
        $this->router->getContext()->setMethod($method);

        return $this->router->match($route);
    }
}
