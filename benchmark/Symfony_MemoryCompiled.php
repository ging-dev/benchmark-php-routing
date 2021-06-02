<?php

namespace Benchmark_Routing;

use Symfony\Component\Routing\Matcher\CompiledUrlMatcher;
use Symfony\Component\Routing\Matcher\Dumper\CompiledUrlMatcherDumper;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;

use function file_put_contents;

class Symfony_MemoryCompiled extends Benchmark
{
	protected $compiled;

	function __construct()
	{
		$dumper = new CompiledUrlMatcherDumper( $this->loadedRoutes() );
		$this->compiled = $dumper->getCompiledRoutes();
	}

	function runRouting(string $route) : array
	{
		$matcher = new CompiledUrlMatcher($this->compiled, new RequestContext());

		return $matcher->match($route);
	}

	function loadedRoutes() : RouteCollection
	{
		return include __DIR__ . '/symfony-routes.php';
	}
}
