<?php

namespace Benchmark_Routing;

use FastRoute\DataGenerator;
use FastRoute\Dispatcher;

class FastRoute_GroupPosBased_Cached extends FastRoute_Abstract
{
	protected $dataGeneratorClass = DataGenerator\GroupPosBased::class;
	protected $dispatcherClass = Dispatcher\GroupPosBased::class;

    public function __construct()
    {
        $this->cache_file = sys_get_temp_dir() . '/fast-route-group-pos-based.php';
    }
}
