<?php

namespace Benchmark_Routing;

use HackRouting\Cache\ApcuCache;

class HackRouting_ApcuCached extends HackRouting_Abstract
{
    public function __construct()
    {
        $cache = new ApcuCache();
        // call getResolver() to trigger cache
        $this->loadedRoutes($cache)->getResolver();

        $this->cache = $cache;
    }
}
