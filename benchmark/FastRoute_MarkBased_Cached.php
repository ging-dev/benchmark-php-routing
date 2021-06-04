<?php

namespace Benchmark_Routing;

use FastRoute\DataGenerator;
use FastRoute\Dispatcher;

class FastRoute_MarkBased_Cached extends FastRoute_Abstract
{
	protected $dataGeneratorClass = DataGenerator\MarkBased::class;
	protected $dispatcherClass = Dispatcher\MarkBased::class;

    public function __construct()
    {
        $this->cache_file = sys_get_temp_dir() . '/fast-route-mark-based.php';
    }
}
