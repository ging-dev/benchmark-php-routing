<?php

namespace BenchmarkRouting\FastRoute;

use FastRoute\DataGenerator;
use FastRoute\Dispatcher;
use PhpBench\Attributes as Bench;

#[Bench\Groups(['fast-route', 'instance'])]
final class FastRouteGroupPosBasedInstance extends AbstractFastRouteInstance
{
    protected string $dataGeneratorClass = DataGenerator\GroupPosBased::class;
    protected string $dispatcherClass = Dispatcher\GroupPosBased::class;
}
