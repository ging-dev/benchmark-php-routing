<?php

namespace Benchmark_Routing;

use HackRouting\BaseRouter;
use HackRouting\Cache\CacheInterface;
use HackRouting\Cache\MemoryCache;
use HackRouting\HttpMethod;
 
class HackRouting_Instance extends Benchmark
{
    protected $router;
    
    public function __construct()
    {
        $cache = new MemoryCache();

        $this->router = include __DIR__ . '/hack-routes.php';

        // trigger caching.
        $this->router->getResolver();
    }

    public function runRouting(string $route) : array
	{
		return ['_route' => $this->router->routeMethodAndPath(HttpMethod::GET, $route)[0]];
	}
}
