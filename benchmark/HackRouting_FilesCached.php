<?php

namespace Benchmark_Routing;

use HackRouting\Cache\FileCache;

class HackRouting_FilesCached extends HackRouting_Abstract
{
    public function __construct()
    {
        $cache = new FileCache();
        $this->loadedRoutes($cache);

        $this->cache = $cache;
    }
}
