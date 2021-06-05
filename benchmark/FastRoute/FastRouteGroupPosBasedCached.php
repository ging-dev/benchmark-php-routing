<?php

namespace BenchmarkRouting\FastRoute;

use FastRoute\DataGenerator;
use FastRoute\Dispatcher;
use PhpBench\Attributes as Bench;

#[Bench\Groups(['fast-route', 'cached'])]
final class FastRouteGroupPosBasedCached extends AbstractFastRoute
{
    protected string $dataGeneratorClass = DataGenerator\GroupPosBased::class;
    protected string $dispatcherClass = Dispatcher\GroupPosBased::class;

    public function __construct()
    {
        $this->cache_file = sys_get_temp_dir() . '/fast-route-group-pos-based.php';
    }
}
