<?php

namespace BenchmarkRouting\FastRoute;

use FastRoute\DataGenerator;
use FastRoute\Dispatcher;
use PhpBench\Attributes as Bench;

#[Bench\Groups(['fast-route', 'raw'])]
final class FastRouteGroupPosBased extends AbstractFastRoute
{
    protected string $dataGeneratorClass = DataGenerator\GroupPosBased::class;
    protected string $dispatcherClass = Dispatcher\GroupPosBased::class;
}
