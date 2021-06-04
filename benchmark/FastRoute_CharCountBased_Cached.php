<?php

namespace Benchmark_Routing;

use FastRoute\DataGenerator;
use FastRoute\Dispatcher;

class FastRoute_CharCountBased_Cached extends FastRoute_Abstract
{
	protected $dataGeneratorClass = DataGenerator\CharCountBased::class;
	protected $dispatcherClass = Dispatcher\CharCountBased::class;
	
	public function __construct()
    {
        $this->cache_file = sys_get_temp_dir() . '/fast-route-char-count-based.php';
    }
}
