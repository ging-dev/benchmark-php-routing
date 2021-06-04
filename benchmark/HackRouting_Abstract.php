<?php

namespace Benchmark_Routing;

use HackRouting\BaseRouter;
use HackRouting\Cache\CacheInterface;
use HackRouting\HttpMethod;

abstract class HackRouting_Abstract extends Benchmark
{
    protected $cache;
    
    public function runRouting(string $route) : array
	{
	    $router = $this->loadedRoutes($this->cache);

		return ['_route' => $router->routeMethodAndPath(HttpMethod::GET, $route)[0]];
	}

	public function loadedRoutes(CacheInterface $cache = null) : BaseRouter
	{
		return include __DIR__ . '/hack-routes.php';
	}
}
