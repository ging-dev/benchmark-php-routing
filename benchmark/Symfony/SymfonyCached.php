<?php

namespace BenchmarkRouting\Symfony;

use BenchmarkRouting\Benchmark;
use Symfony\Component\Routing\Matcher\CompiledUrlMatcher;
use Symfony\Component\Routing\Matcher\Dumper\CompiledUrlMatcherDumper;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use PhpBench\Attributes as Bench;

use function file_put_contents;

#[Bench\Groups(['symfony', 'cached'])]
final class SymfonyCached extends Benchmark
{
    protected $cached_routes = '/tmp/benchmark-symfony-compiled-routes.php';

    public function __construct()
    {
        $dumper = new CompiledUrlMatcherDumper($this->loadedRoutes());
        $compiled = $dumper->getCompiledRoutes();

        file_put_contents(
            $this->cached_routes,
            '<?php return ' . \var_export($compiled, true) . ';'
        );
    }

    public function runRouting(string $route): array
    {
        $matcher = new CompiledUrlMatcher(
            include $this->cached_routes,
            new RequestContext()
        );

        return $matcher->match($route);
    }

    public function loadedRoutes(): RouteCollection
    {
        return include __DIR__ . '/../../routes/symfony-routes.php';
    }
}
