<?php

namespace BenchmarkRouting\HackRouting;

use HackRouting\Cache\ApcuCache;
use PhpBench\Attributes as Bench;

#[Bench\Groups(['hack-routing', 'cached'])]
final class HackRoutingApcuCached extends AbstractHackRoutingCached
{
    public function __construct()
    {
        $cache = new ApcuCache();
        // call getResolver() to trigger cache
        $this->loadedRoutes($cache)->getResolver();

        $this->cache = $cache;
    }
}
