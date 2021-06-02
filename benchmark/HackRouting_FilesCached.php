<?php

namespace Benchmark_Routing;

use HackRouting\Cache\FileCache;

class HackRouting_FilesCached extends HackRouting_Abstract
{
    public function __construct()
    {
        $cache = new FileCache();
        // call getResolver() to trigger cache
        $this->loadedRoutes($cache)->getResolver();

        $this->cache = $cache;
    }
}
