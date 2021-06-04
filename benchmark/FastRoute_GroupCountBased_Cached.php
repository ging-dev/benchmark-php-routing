<?php

namespace Benchmark_Routing;

use FastRoute\DataGenerator;
use FastRoute\Dispatcher;

class FastRoute_GroupCountBased_Cached extends FastRoute_Abstract
{
	protected $dataGeneratorClass = DataGenerator\GroupCountBased::class;
	protected $dispatcherClass = Dispatcher\GroupCountBased::class;

    public function __construct()
    {
        $this->cache_file = sys_get_temp_dir() . '/fast-route-group-count-based.php';
    }
}
