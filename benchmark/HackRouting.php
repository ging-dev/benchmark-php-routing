<?php

namespace Benchmark_Routing;

use HackRouting\BaseRouter;
use HackRouting\Cache\CacheInterface;
use HackRouting\HttpMethod;
 
class HackRouting extends Benchmark
{
    public function runRouting(string $route) : array
	{
	    $router = $this->loadedRoutes();

		return ['_route' => $router->routeMethodAndPath(HttpMethod::GET, $route)[0]];
	}

	public function loadedRoutes() : BaseRouter
	{
	    $cache = null;
		return include __DIR__ . '/hack-routes.php';
	}
}
