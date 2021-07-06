<?php

namespace BenchmarkRouting;

use PhpBench\Attributes as Bench;

use Throwable;
use function assert;

/**
 * Benchmark routing the Bitbucket API paths
 */
abstract class Benchmark
{
    abstract public function runRouting(string $route, string $method = 'GET'): array;

    #[Bench\Revs(100), Bench\Iterations(5), Bench\ParamProviders("getLastRoute"), Bench\Groups(['last'])]
    public function benchLast(array $last): void
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
    public function benchLongest(array $longest): void
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

    #[Bench\Revs(4), Bench\Iterations(5), Bench\Groups(['all'])]
    public function benchAll(): void
    {
        $routes = $this->getRoutes();
        foreach ($routes as $params) {
            $this->runRoute($params['route'], $params['result']);
        }
    }

    #[Bench\Revs(4), Bench\Iterations(5), Bench\Groups(['invalid_method'])]
    public function benchInvalidMethod(): void
    {
        $routes = $this->getRoutes();
        foreach ($routes as $params) {
            $this->runRoute($params['route'], $params['result'], 'DELETE');
        }
    }

    public function runRoute($route, array $result, string $method = 'GET'): void
    {
        try {
            $match = $this->runRouting($route, $method);
            assert($match['_route'] === $result['_route']);
        } catch (Throwable $e) {
            // ignore
        }
    }

    public function getRoutes(): array
    {
        return include __DIR__ . '/../routes/result-routes.php';
    }
}
