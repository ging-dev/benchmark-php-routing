<?php

namespace BenchmarkRouting\FastRoute;

use FastRoute\DataGenerator;
use FastRoute\Dispatcher;
use PhpBench\Attributes as Bench;

#[Bench\Groups(['fast-route', 'instance'])]
final class FastRouteCharCountBasedInstance extends AbstractFastRouteInstance
{
    protected string $dataGeneratorClass = DataGenerator\CharCountBased::class;
    protected string $dispatcherClass = Dispatcher\CharCountBased::class;
}
