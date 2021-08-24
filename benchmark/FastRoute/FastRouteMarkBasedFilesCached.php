<?php

namespace BenchmarkRouting\FastRoute;

use FastRoute\Cache\FileCache;
use FastRoute\DataGenerator;
use FastRoute\Dispatcher;
use PhpBench\Attributes as Bench;

#[Bench\Groups(['fast-route', 'cached'])]
final class FastRouteMarkBasedFilesCached extends AbstractFastRoute
{
    protected string $dataGeneratorClass = DataGenerator\MarkBased::class;
    protected string $dispatcherClass = Dispatcher\MarkBased::class;

    public function __construct()
    {
        $this->cacheDriver = FileCache::class;
        $this->cacheKey = __DIR__.'/../../cache/fast-route-mark-based.php';

        $this->createDispatcher();
    }
}
