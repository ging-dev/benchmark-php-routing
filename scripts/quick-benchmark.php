<?php

namespace BenchmarkRouting;

/* Quick and dirty script to calculate routes matched per second */

use Psl\Shell;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\ConsoleOutput;

require __DIR__ . '/../vendor/autoload.php';


final class QuickBenchmark
{
    public const BENCHMARKS = array(
        // uncached, router instance is created in each iteration from scratch.
        'symfony' => Symfony\Symfony::class,
        'hack-routing' => HackRouting\HackRouting::class,
        'fast-route:dispatcher(mark)' => FastRoute\FastRouteMarkBased::class,
        'fast-route:dispatcher(group_pos)' => FastRoute\FastRouteGroupPosBased::class,
        'fast-route:dispatcher(char_count)' => FastRoute\FastRouteCharCountBased::class,
        'fast-route:dispatcher(group_count)' => FastRoute\FastRouteGroupCountBased::class,

        // router instance is created in each iteration using cache.
        'symfony:cached(file)' => Symfony\SymfonyCached::class,
        'hack-routing:cached(file)' => HackRouting\HackRoutingFilesCached::class,
        'hack-routing:cached(apcu)' => HackRouting\HackRoutingApcuCached::class,
        'fast-route:dispatcher(mark):cached(file)' => FastRoute\FastRouteMarkBasedCached::class,
        'fast-route:dispatcher(group_pos):cached(file)' => FastRoute\FastRouteGroupPosBasedCached::class,
        'fast-route:dispatcher(char_count):cached(file)' => FastRoute\FastRouteCharCountBasedCached::class,
        'fast-route:dispatcher(group_count):cached(file)' => FastRoute\FastRouteGroupCountBasedCached::class,

        // router instance is only created once in the constructor, and kept in the memory.
        // 'symfony:instance' => Symfony\SymfonyInstance::class,
        // 'hack-routing:instance' => HackRouting\HackRoutingInstance::class,
        // 'fast-route:dispatcher(mark):instance' => FastRoute\FastRouteMarkBasedInstance::class,
        // 'fast-route:dispatcher(group_pos):instance' => FastRoute\FastRouteGroupPosBasedInstance::class,
        // 'fast-route:dispatcher(char_count):instance' => FastRoute\FastRouteCharCountBasedInstance::class,
        // 'fast-route:dispatcher(group_count):instance' => FastRoute\FastRouteGroupCountBasedInstance::class,
    );

    public const REPEATS = 300;

    public const scenario = [
        'benchAll' => [182, 2], /* total number of routes */
        'benchLongest' => [1, self::REPEATS],
        'benchLast' => [1, self::REPEATS],
    ];

    public static function main($case, $scenario): void
    {
        $benchmark = new self();

        ('' === $case)
            ? $benchmark->all()
            : $benchmark->run($case, $scenario);
    }

    public function all(): void
    {
        $output = new ConsoleOutput();
        $progressBar = new ProgressBar(
            $output,
            count(self::BENCHMARKS) * count(self::scenario)
        );

        $result = [];
        foreach (self::BENCHMARKS as $case => $class) {
            foreach (self::scenario as $scenario => $revs) {
                $time = Shell\execute("php", ["-dopcache.jit=1235", "-dopcache.enable_cli=1", "-dopcache.enable=1", "-dapc.enable=1", "-dapc.enable_cli=1", __FILE__, $case, $scenario]);
                $progressBar->advance();

                $result[] = array(
                    'case' => $case,
                    'scenario' => $scenario,
                    'time' => $time,
                    'repeats' => $revs[0] * $revs[1],
                    'per_second' => $revs[0] * $revs[1] / $time,
                );
            }
        }

        $progressBar->finish();
        $output->writeln('');

        usort($result, static function ($a, $b) {
            return $b['per_second'] <=> $a['per_second'];
        });

        $table = new Table($output);
        $table->setHeaders(['Case', 'Scenario', 'Routes', 'Time', 'Per Second']);

        foreach ($result as $data) {
            $table->addRow([
                $data['case'],
                $data['scenario'],
                $data['repeats'],
                sprintf('%0.6f seconds', $data['time']),
                $data['per_second']
            ]);
        }
        $table->render();
    }

    public function run(string $case, string $scenario): void
    {
        $class = self::BENCHMARKS[$case];
        $bench = new $class();
        $repeats = self::scenario[$scenario][1];

        $start = microtime(true);
        for ($i = 0; $i < $repeats; $i++) {
            $this->$scenario($bench);
        }

        echo microtime(true) - $start;
    }

    public function benchAll(Benchmark $bench): void
    {
        $bench->benchAll();
    }

    public function benchLongest(Benchmark $bench): void
    {
        $bench->runRouting($bench->getLongestRoute()[0]['route']);
    }

    public function benchLast(Benchmark $bench): void
    {
        $bench->runRouting($bench->getLastRoute()[0]['route']);
    }
}

QuickBenchmark::main($argv[1] ?? '', $argv[2] ?? '');