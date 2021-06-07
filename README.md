# Benchmark PHP Routing

Take a real world routing scenario in the form of [Bitbucket API](https://developer.atlassian.com/bitbucket/api/2/reference/resource/) and benchmark PHP routing packages against it.

You can read more about this here: http://kaloyan.info/writing/2021/05/31/benchmark-php-routing.html

# Packages
Here are the packages that are benchmakred:

* Symfony Routing [symfony/routing](https://github.com/symfony/routing)
* Fast Route [nikic/FastRoute](https://github.com/nikic/FastRoute)
* Hack Routing [azjezz/hack-routing](https://github.com/azjezz/hack-routing)

So far these are the most popular ones: **Symfony Routing** component is used not only by
them but by **Laravel** as well, and **FastRoute** is used by other popular solutions such
as the [Slim](https://github.com/slimphp/Slim) framework and [League\Route](https://github.com/thephpleague/route).

**Hack Routing** is a PHP rewrite of [hhvm/hack-router](https://github.com/hhvm/hack-router) by Facebook, Inc.
It implements the same algorithm used to route HTTP requests throughout facebook.com.

# Benchmarks

This is the list of the available [phpbench](https://github.com/phpbench/phpbench)
benchmarks. They are combination of the packages and the strategies they provide.

| Package | File | Strategy |
|---------|------|----------|
| [symfony/routing](https://github.com/symfony/routing) | benchmark/Symfony/Symfony.php | `Symfony\Component\Routing\Matcher\UrlMatcher` |
| [symfony/routing](https://github.com/symfony/routing) | benchmark/Symfony/SymfonyCached.php | `Symfony\Component\Routing\Matcher\CompiledUrlMatcher` |
| [symfony/routing](https://github.com/symfony/routing) | benchmark/Symfony/SymfonyInstance.php | `Symfony\Component\Routing\Matcher\CompiledUrlMatcher` |
| [nikic/FastRoute](https://github.com/nikic/FastRoute) | benchmark/FastRoute/FastRouteGroupCountBased.php | `FastRoute\Dispatcher\GroupCountBased` |
| [nikic/FastRoute](https://github.com/nikic/FastRoute) | benchmark/FastRoute/FastRouteGroupPosBased.php | `FastRoute\Dispatcher\GroupPosBased` |
| [nikic/FastRoute](https://github.com/nikic/FastRoute) | benchmark/FastRoute/FastRouteCharCountBased.php | `FastRoute\Dispatcher\CharCountBased` |
| [nikic/FastRoute](https://github.com/nikic/FastRoute) | benchmark/FastRoute/FastRouteMarkBased.php | `FastRoute\Dispatcher\MarkBased` |
| [nikic/FastRoute](https://github.com/nikic/FastRoute) | benchmark/FastRoute/FastRouteGroupCountBasedCached.php | `FastRoute\Dispatcher\GroupCountBased` |
| [nikic/FastRoute](https://github.com/nikic/FastRoute) | benchmark/FastRoute/FastRouteGroupPosBasedCached.php | `FastRoute\Dispatcher\GroupPosBased` |
| [nikic/FastRoute](https://github.com/nikic/FastRoute) | benchmark/FastRoute/FastRouteCharCountBasedCached.php | `FastRoute\Dispatcher\CharCountBased` |
| [nikic/FastRoute](https://github.com/nikic/FastRoute) | benchmark/FastRoute/FastRouteMarkBasedCached.php | `FastRoute\Dispatcher\MarkBased` |
| [nikic/FastRoute](https://github.com/nikic/FastRoute) | benchmark/FastRoute/FastRouteGroupCountBasedInstance.php | `FastRoute\Dispatcher\GroupCountBased` |
| [nikic/FastRoute](https://github.com/nikic/FastRoute) | benchmark/FastRoute/FastRouteGroupPosBasedInstance.php | `FastRoute\Dispatcher\GroupPosBased` |
| [nikic/FastRoute](https://github.com/nikic/FastRoute) | benchmark/FastRoute/FastRouteCharCountBasedInstance.php | `FastRoute\Dispatcher\CharCountBased` |
| [nikic/FastRoute](https://github.com/nikic/FastRoute) | benchmark/FastRoute/FastRouteMarkBasedInstance.php | `FastRoute\Dispatcher\MarkBased` |
| [azjezz/hack-routing](https://github.com/azjezz/hack-routing) | benchmark/HackRouting/HackRouting.php | `HackRouting\PrefixMatchingResolver` |
| [azjezz/hack-routing](https://github.com/azjezz/hack-routing) | benchmark/HackRouting/HackRoutingFilesCached.php | `HackRouting\PrefixMatchingResolver` |
| [azjezz/hack-routing](https://github.com/azjezz/hack-routing) | benchmark/HackRouting/HackRoutingApcuCached.php | `HackRouting\PrefixMatchingResolver` |
| [azjezz/hack-routing](https://github.com/azjezz/hack-routing) | benchmark/HackRouting/HackRoutingInstance.php | `HackRouting\PrefixMatchingResolver` |

The benchmark cases are:

* **benchLast** -- match the last route in the list of routing definitions, as this is considered the worst case
* **benchLongest** -- match the longest route to test the complexity of parsing bigger paths
* **benchAll** -- match all the routes from the list of routing definitions to average the overall performance

### Running the benchmarks

To run the benchmarks, first you have to run `composer update` to get all the packages and their dependencies.

After that, you can execute any of benchmark files like this:

```sh
php vendor/bin/phpbench run benchmark/Symfony/Symfony.php --report=default 
```

Or you can run all the benchmarks at once

```sh
php vendor/bin/phpbench run --report=default
```

### Quick Benchmark

In addition to the phpbench running its own cases, there is also a script that
will run all the scenarios against all the packages and strategies, and
calculate the number of routes matched per second. The results are then sorted
by that data. Here's how to run this:

```sh
php scripts/quick-benchmark.php
```

# Routes

All the routes for this benchmark are read from this address:
https://developer.atlassian.com/bitbucket/api/2/reference/resource/

Only the paths are used, and the HTTP verbs/methods are ignored.

You can see the list of paths in [bitbucket-routes.txt](routes/bitbucket-routes.txt):

```
/addon
/addon/linkers
/addon/linkers/{linker_key}
/addon/linkers/{linker_key}/values
/addon/linkers/{linker_key}/values/{value_id}
/hook_events
/hook_events/{subject_type}
/pullrequests/{selected_user}
/repositories
/repositories/{workspace}
/repositories/{workspace}/{repo_slug}
...
```

# Scripts

There are a few scripts to assist with some grunt work:

* [scripts/download-bitbucket-routes.php](scripts/download-bitbucket-routes.php):
	downloads the path definitions from [Bitbucket API](https://developer.atlassian.com/bitbucket/api/2/reference/resource/) page
* [scripts/generate-routes.php](scripts/generate-routes.php):
	generates the routes definitions for the packages, as well as the expected results
* [scripts/quick-benchmark.php](scripts/quick-benchmark.php):
	runs the benchmark cases to calculate number of matches per second (more is better)

# Results

Here are the results from the benchmarks executed by GitHub Actions:

https://github.com/azjezz/benchmark-php-routing/actions

## Cached - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents a production environment when using a traditional web server with PHP fpm/fast-cgi

```sh
+------------------------------- Benchmark results for group cached. -------------+-----------------+
| Case                                 | Scenario     | Routes | Time             | Per Second      |
+--------------------------------------+--------------+--------+------------------+-----------------+
| hack-routing:cached(apcu)            | benchLast    | 300    | 0.071392 seconds | 4202.1480096179 |
| hack-routing:cached(apcu)            | benchAll     | 364    | 0.086878 seconds | 4189.7804183944 |
| hack-routing:cached(apcu)            | benchLongest | 300    | 0.124827 seconds | 2403.3233822864 |
| hack-routing:cached(file)            | benchLast    | 300    | 0.138049 seconds | 2173.1394425063 |
| hack-routing:cached(file)            | benchAll     | 364    | 0.169583 seconds | 2146.4405250793 |
| fast-route(mark):cached(file)        | benchLast    | 300    | 0.183441 seconds | 1635.403888969  |
| fast-route(mark):cached(file)        | benchAll     | 364    | 0.227994 seconds | 1596.5334861483 |
| fast-route(group_count):cached(file) | benchLast    | 300    | 0.189775 seconds | 1580.8194740029 |
| fast-route(group_pos):cached(file)   | benchLast    | 300    | 0.189993 seconds | 1579.0063346417 |
| fast-route(char_count):cached(file)  | benchLast    | 300    | 0.193695 seconds | 1548.8281235575 |
| fast-route(group_pos):cached(file)   | benchAll     | 364    | 0.236094 seconds | 1541.7588043424 |
| fast-route(group_count):cached(file) | benchAll     | 364    | 0.237421 seconds | 1533.1413192799 |
| hack-routing:cached(file)            | benchLongest | 300    | 0.196600 seconds | 1525.9413048751 |
| fast-route(char_count):cached(file)  | benchAll     | 364    | 0.240716 seconds | 1512.1555253576 |
| fast-route(mark):cached(file)        | benchLongest | 300    | 0.234355 seconds | 1280.1093843468 |
| fast-route(group_pos):cached(file)   | benchLongest | 300    | 0.240801 seconds | 1245.8427393484 |
| fast-route(group_count):cached(file) | benchLongest | 300    | 0.241700 seconds | 1241.2084481284 |
| fast-route(char_count):cached(file)  | benchLongest | 300    | 0.246990 seconds | 1214.6242438108 |
| symfony:cached(file)                 | benchAll     | 364    | 0.358570 seconds | 1015.1438816823 |
| symfony:cached(file)                 | benchLast    | 300    | 0.297417 seconds | 1008.6850288226 |
| symfony:cached(file)                 | benchLongest | 300    | 0.364512 seconds | 823.01824741608 |
+--------------------------------------+--------------+--------+------------------+-----------------+
```

## Instances - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents a production environment when using a long-running-process server such as Amphp, ReactPHP, Roadrunner, etc.

```sh
+---------------------------- Benchmark results for group instance. ----------+-----------------+
| Case                             | Scenario     | Routes | Time             | Per Second      |
+----------------------------------+--------------+--------+------------------+-----------------+
| symfony:instance                 | benchAll     | 364    | 0.003358 seconds | 108393.79879304 |
| fast-route(mark):instance        | benchAll     | 364    | 0.004451 seconds | 81778.705661792 |
| symfony:instance                 | benchLast    | 300    | 0.003704 seconds | 80991.967044284 |
| hack-routing:instance            | benchLast    | 300    | 0.004165 seconds | 72029.950197493 |
| fast-route(group_pos):instance   | benchAll     | 364    | 0.005115 seconds | 71162.797427054 |
| fast-route(char_count):instance  | benchAll     | 364    | 0.005122 seconds | 71066.734441186 |
| hack-routing:instance            | benchAll     | 364    | 0.005364 seconds | 67860.550093341 |
| fast-route(mark):instance        | benchLast    | 300    | 0.004731 seconds | 63412.346923348 |
| fast-route(group_count):instance | benchAll     | 364    | 0.005814 seconds | 62606.686459444 |
| fast-route(char_count):instance  | benchLast    | 300    | 0.005328 seconds | 56306.94052893  |
| fast-route(group_pos):instance   | benchLast    | 300    | 0.005554 seconds | 54015.505473278 |
| fast-route(group_count):instance | benchLast    | 300    | 0.007991 seconds | 37543.000358038 |
| symfony:instance                 | benchLongest | 300    | 0.053899 seconds | 5565.9854557036 |
| fast-route(mark):instance        | benchLongest | 300    | 0.055202 seconds | 5434.5849853585 |
| fast-route(group_pos):instance   | benchLongest | 300    | 0.055593 seconds | 5396.3615154348 |
| fast-route(group_count):instance | benchLongest | 300    | 0.056055 seconds | 5351.8799550852 |
| fast-route(char_count):instance  | benchLongest | 300    | 0.056089 seconds | 5348.6495447474 |
| hack-routing:instance            | benchLongest | 300    | 0.056218 seconds | 5336.3777857885 |
+----------------------------------+--------------+--------+------------------+-----------------+
```

## Raw ( No Caching ) - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents development environment

```sh
+-------------------------+ Benchmark results for group raw. --------+-----------------+
| Case                    | Scenario     | Routes | Time             | Per Second      |
+-------------------------+--------------+--------+------------------+-----------------+
| fast-route(mark)        | benchAll     | 364    | 0.351275 seconds | 1036.225276478  |
| fast-route(mark)        | benchLast    | 300    | 0.291121 seconds | 1030.499324352  |
| fast-route(group_pos)   | benchAll     | 364    | 0.354351 seconds | 1027.2299361617 |
| fast-route(group_pos)   | benchLast    | 300    | 0.294723 seconds | 1017.9048309358 |
| fast-route(char_count)  | benchAll     | 364    | 0.364035 seconds | 999.90415443852 |
| fast-route(group_count) | benchLast    | 300    | 0.300160 seconds | 999.46638622422 |
| fast-route(group_count) | benchAll     | 364    | 0.365364 seconds | 996.26653302429 |
| fast-route(char_count)  | benchLast    | 300    | 0.302995 seconds | 990.11467879079 |
| fast-route(group_pos)   | benchLongest | 300    | 0.347251 seconds | 863.9285508309  |
| fast-route(mark)        | benchLongest | 300    | 0.349004 seconds | 859.58951461511 |
| symfony                 | benchAll     | 364    | 0.424144 seconds | 858.19904226502 |
| fast-route(group_count) | benchLongest | 300    | 0.358455 seconds | 836.92471416123 |
| fast-route(char_count)  | benchLongest | 300    | 0.359769 seconds | 833.8681534095  |
| symfony                 | benchLongest | 300    | 0.404066 seconds | 742.4528079227  |
| symfony                 | benchLast    | 300    | 0.563238 seconds | 532.63438074629 |
| hack-routing            | benchAll     | 364    | 2.320230 seconds | 156.88099838159 |
| hack-routing            | benchLast    | 300    | 1.934392 seconds | 155.08749199475 |
| hack-routing            | benchLongest | 300    | 1.950472 seconds | 153.80891501433 |
+-------------------------+--------------+--------+------------------+-----------------+
```