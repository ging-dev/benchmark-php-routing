<?php

namespace BenchmarkRouting\FastRoute;

use FastRoute\DataGenerator;
use FastRoute\Dispatcher;
use PhpBench\Attributes as Bench;

#[Bench\Groups(['fast-route', 'cached'])]
final class FastRouteCharCountBasedCached extends AbstractFastRoute
{
    protected string $dataGeneratorClass = DataGenerator\CharCountBased::class;
    protected string $dispatcherClass = Dispatcher\CharCountBased::class;

    public function __construct()
    {
        $this->cache_file = sys_get_temp_dir() . '/fast-route-char-count-based.php';
    }
}
