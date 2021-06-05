<?php

namespace BenchmarkRouting\FastRoute;

use FastRoute\DataGenerator;
use FastRoute\Dispatcher;
use PhpBench\Attributes as Bench;

#[Bench\Groups(['fast-route', 'cached'])]
final class FastRouteGroupCountBasedCached extends AbstractFastRoute
{
    protected string $dataGeneratorClass = DataGenerator\GroupCountBased::class;
    protected string $dispatcherClass = Dispatcher\GroupCountBased::class;

    public function __construct()
    {
        $this->cache_file = sys_get_temp_dir() . '/fast-route-group-count-based.php';
    }
}
