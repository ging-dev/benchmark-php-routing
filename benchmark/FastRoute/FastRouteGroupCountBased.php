<?php

namespace BenchmarkRouting\FastRoute;

use FastRoute\DataGenerator;
use FastRoute\Dispatcher;
use PhpBench\Attributes as Bench;

#[Bench\Groups(['fast-route', 'raw'])]
final class FastRouteGroupCountBased extends AbstractFastRoute
{
    protected string $dataGeneratorClass = DataGenerator\GroupCountBased::class;
    protected string $dispatcherClass = Dispatcher\GroupCountBased::class;
}
