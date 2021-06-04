<?php

namespace Benchmark_Routing;

use Symfony\Component\Routing\Matcher\CompiledUrlMatcher;
use Symfony\Component\Routing\Matcher\Dumper\CompiledUrlMatcherDumper;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;

use function file_put_contents;

class Symfony_Instance extends Benchmark
{
	protected $matcher;

	function __construct()
	{
		$dumper = new CompiledUrlMatcherDumper( $this->loadedRoutes() );
		$compiled = $dumper->getCompiledRoutes();
        $this->matcher = new CompiledUrlMatcher($compiled, new RequestContext());
    }

	function runRouting(string $route) : array
	{
		return $this->matcher->match($route);
	}

	function loadedRoutes() : RouteCollection
	{
		return include __DIR__ . '/symfony-routes.php';
	}
}
