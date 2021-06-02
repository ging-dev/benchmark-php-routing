<?php

namespace Benchmark_Routing;

use HackRouting\Cache\FileCache;
use HackRouting\Cache\MemoryCache;

class HackRouting_MemoryCached extends HackRouting_Abstract
{
    public function __construct()
    {
        $cache = new MemoryCache();
        // call getResolver() to trigger cache
        $this->loadedRoutes($cache)->getResolver();

        $this->cache = $cache;
    }
}
