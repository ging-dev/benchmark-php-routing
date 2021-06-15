<?php

namespace BenchmarkRouting\FastRoute;

use FastRoute\Cache\ApcuCache;
use FastRoute\DataGenerator;
use FastRoute\Dispatcher;
use PhpBench\Attributes as Bench;

#[Bench\Groups(['fast-route', 'cached'])]
final class FastRouteMarkBasedApcuCached extends AbstractFastRoute
{
    protected string $dataGeneratorClass = DataGenerator\MarkBased::class;
    protected string $dispatcherClass = Dispatcher\MarkBased::class;

    public function __construct()
    {
        $this->cacheDriver = ApcuCache::class;
        $this->cacheKey = 'fast-route-mark-based';
    }
}
