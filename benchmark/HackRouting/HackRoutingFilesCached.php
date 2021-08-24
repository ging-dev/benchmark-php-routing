<?php

namespace BenchmarkRouting\HackRouting;

use HackRouting\Cache\FileCache;
use PhpBench\Attributes as Bench;

#[Bench\Groups(['hack-routing', 'cached'])]
final class HackRoutingFilesCached extends AbstractHackRoutingCached
{
    public function __construct()
    {
        $cache = new FileCache(__DIR__.'/../../cache');
        // call getResolver() to trigger cache
        $this->loadedRoutes($cache)->getResolver();

        $this->cache = $cache;
    }
}
