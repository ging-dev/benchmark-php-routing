<?php

namespace BenchmarkRouting\FastRoute;

use FastRoute\DataGenerator;
use FastRoute\Dispatcher;
use PhpBench\Attributes as Bench;

#[Bench\Groups(['fast-route', 'raw'])]
final class FastRouteMarkBased extends AbstractFastRoute
{
    protected string $dataGeneratorClass = DataGenerator\MarkBased::class;
    protected string $dispatcherClass = Dispatcher\MarkBased::class;
}
