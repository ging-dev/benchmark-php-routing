<?php

namespace BenchmarkRouting;

use PhpBench\Attributes as Bench;

use function assert;

/**
 * Benchmark routing the Bitbucket API paths
 */
abstract class Benchmark
{
    abstract public function runRouting(string $route): array;

    #[Bench\Revs(100), Bench\Iterations(5), Bench\ParamProviders("getLastRoute"), Bench\Groups(['last'])]
    public function benchLast(array $last)
    {
        $this->runRoute($last['route'], $last['result']);
    }

    public function getLastRoute(): array
    {
        $routes = $this->getRoutes();
        $last = array_pop($routes);

        return array($last);
    }

    #[Bench\Revs(100), Bench\Iterations(5), Bench\ParamProviders("getLongestRoute"), Bench\Groups(['longest'])]
    public function benchLongest(array $longest)
    {
        $this->runRoute($longest['route'], $longest['result']);
    }

    public function getLongestRoute(): array
    {
        $routes = $this->getRoutes();
        usort($routes, static function ($a, $b) {
            return strlen($a['route']) <=> strlen($b['route']);
        });
        $longest = array_pop($routes);

        return array($longest);
    }

    #[Bench\Revs(10), Bench\Iterations(1), Bench\Groups(['all'])]
    public function benchAll()
    {
        $routes = $this->getRoutes();
        foreach ($routes as $params) {
            $this->runRoute($params['route'], $params['result']);
        }
    }

    public function runRoute($route, array $result)
    {
        $match = $this->runRouting($route);
        assert($match['_route'] === $result['_route']);
    }

    public function getRoutes(): array
    {
        return include __DIR__ . '/../routes/result-routes.php';
    }
}
