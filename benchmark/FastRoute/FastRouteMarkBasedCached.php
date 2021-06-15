<?php

namespace BenchmarkRouting\FastRoute;

use FastRoute\DataGenerator;
use FastRoute\Dispatcher;
use PhpBench\Attributes as Bench;

#[Bench\Groups(['fast-route', 'cached'])]
final class FastRouteMarkBasedCached extends AbstractFastRoute
{
    protected string $dataGeneratorClass = DataGenerator\MarkBased::class;
    protected string $dispatcherClass = Dispatcher\MarkBased::class;

    public function __construct()
    {
        $this->cacheKey = sys_get_temp_dir() . '/fast-route-mark-based.php';
    }
}
