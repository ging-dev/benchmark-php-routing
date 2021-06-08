<?php

namespace BenchmarkRouting\Symfony;

use BenchmarkRouting\Benchmark;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\PhpFileLoader;
use Symfony\Component\Routing\Router;
use PhpBench\Attributes as Bench; 

#[Bench\Groups(['symfony', 'cached'])]
final class SymfonyCached extends Benchmark
{
    public function __construct()
    {
        $router = new Router(new PhpFileLoader(new FileLocator(__DIR__ . '/../../routes/')), 'symfony-routes.php', [
            'cache_dir' => __DIR__ . '/../../cache/symfony'
        ]);

        // trigger caching
        $router->getMatcher();
    }

    public function runRouting(string $route): array
    {
        $router = new Router(new PhpFileLoader(new FileLocator(__DIR__ . '/../../routes/')), 'symfony-routes.php', [
            'cache_dir' => __DIR__ . '/../../cache/symfony'
        ]);

        return $router->match($route);
    }
}
