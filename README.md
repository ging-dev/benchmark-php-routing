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
| hack-routing:cached(apcu)            | benchLast    | 300    | 0.081004 seconds | 3703.5251872673 |
| hack-routing:cached(apcu)            | benchAll     | 364    | 0.104073 seconds | 3497.5433915063 |
| hack-routing:cached(apcu)            | benchLongest | 300    | 0.140511 seconds | 2135.0636128861 |
| hack-routing:cached(file)            | benchLast    | 300    | 0.151566 seconds | 1979.335361499  |
| hack-routing:cached(file)            | benchAll     | 364    | 0.186918 seconds | 1947.3802676055 |
| fast-route(mark):cached(file)        | benchLast    | 300    | 0.192308 seconds | 1559.9979171781 |
| fast-route(group_count):cached(file) | benchLast    | 300    | 0.195898 seconds | 1531.4087647386 |
| fast-route(group_pos):cached(file)   | benchLast    | 300    | 0.196869 seconds | 1523.8549209245 |
| fast-route(mark):cached(file)        | benchAll     | 364    | 0.239468 seconds | 1520.0354599055 |
| fast-route(group_count):cached(file) | benchAll     | 364    | 0.243575 seconds | 1494.4071133594 |
| fast-route(group_pos):cached(file)   | benchAll     | 364    | 0.243747 seconds | 1493.3517380073 |
| fast-route(char_count):cached(file)  | benchLast    | 300    | 0.203057 seconds | 1477.4173019774 |
| hack-routing:cached(file)            | benchLongest | 300    | 0.217255 seconds | 1380.866584068  |
| fast-route(char_count):cached(file)  | benchAll     | 364    | 0.264647 seconds | 1375.4170286754 |
| fast-route(mark):cached(file)        | benchLongest | 300    | 0.243616 seconds | 1231.4456840869 |
| fast-route(group_pos):cached(file)   | benchLongest | 300    | 0.247479 seconds | 1212.2242539032 |
| fast-route(char_count):cached(file)  | benchLongest | 300    | 0.252304 seconds | 1189.0414272755 |
| fast-route(group_count):cached(file) | benchLongest | 300    | 0.259302 seconds | 1156.9525676472 |
| symfony:cached(file)                 | benchLast    | 300    | 0.294337 seconds | 1019.2397324021 |
| symfony:cached(file)                 | benchAll     | 364    | 0.360549 seconds | 1009.5715899202 |
| symfony:cached(file)                 | benchLongest | 300    | 0.349989 seconds | 857.16936621613 |
+--------------------------------------+--------------+--------+------------------+-----------------+
```

## Instances - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents a production environment when using a long-running-process server such as Amphp, ReactPHP, Roadrunner, etc.

```sh

+---------------------------- Benchmark results for group instance. ----------+-----------------+
| Case                             | Scenario     | Routes | Time             | Per Second      |
+----------------------------------+--------------+--------+------------------+-----------------+
| symfony:instance                 | benchAll     | 364    | 0.000525 seconds | 693336.35603996 |
| fast-route(mark):instance        | benchAll     | 364    | 0.000893 seconds | 407561.84089696 |
| fast-route(char_count):instance  | benchAll     | 364    | 0.000971 seconds | 374932.87229863 |
| symfony:instance                 | benchLast    | 300    | 0.000917 seconds | 327168.79875195 |
| fast-route(group_count):instance | benchAll     | 364    | 0.001230 seconds | 295934.61058344 |
| fast-route(group_pos):instance   | benchAll     | 364    | 0.001368 seconds | 266119.34042182 |
| fast-route(mark):instance        | benchLast    | 300    | 0.001217 seconds | 246530.40752351 |
| fast-route(char_count):instance  | benchLast    | 300    | 0.001396 seconds | 214908.83005979 |
| hack-routing:instance            | benchLast    | 300    | 0.001446 seconds | 207467.63396537 |
| hack-routing:instance            | benchAll     | 364    | 0.001966 seconds | 185147.54499151 |
| fast-route(group_count):instance | benchLast    | 300    | 0.001879 seconds | 159661.36277122 |
| fast-route(group_pos):instance   | benchLast    | 300    | 0.001895 seconds | 158315.45042778 |
| symfony:instance                 | benchLongest | 300    | 0.052628 seconds | 5700.3832597921 |
| fast-route(group_count):instance | benchLongest | 300    | 0.053517 seconds | 5605.684577243  |
| fast-route(char_count):instance  | benchLongest | 300    | 0.054209 seconds | 5534.1370195585 |
| fast-route(mark):instance        | benchLongest | 300    | 0.054616 seconds | 5492.898426723  |
| hack-routing:instance            | benchLongest | 300    | 0.054749 seconds | 5479.5509375789 |
| fast-route(group_pos):instance   | benchLongest | 300    | 0.056717 seconds | 5289.4269572236 |
+----------------------------------+--------------+--------+------------------+-----------------+
```

## Raw ( No Caching ) - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents development environment

```sh
+-------------------------+ Benchmark results for group raw. --------+-----------------+
| Case                    | Scenario     | Routes | Time             | Per Second      |
+-------------------------+--------------+--------+------------------+-----------------+
| fast-route(group_pos)   | benchAll     | 364    | 0.390988 seconds | 930.97516589204 |
| fast-route(group_pos)   | benchLast    | 300    | 0.322428 seconds | 930.44031882019 |
| fast-route(mark)        | benchAll     | 364    | 0.391503 seconds | 929.75055813291 |
| fast-route(group_count) | benchAll     | 364    | 0.398163 seconds | 914.19881965202 |
| fast-route(mark)        | benchLast    | 300    | 0.328284 seconds | 913.84282200239 |
| fast-route(group_count) | benchLast    | 300    | 0.329979 seconds | 909.14892141223 |
| fast-route(char_count)  | benchAll     | 364    | 0.400421 seconds | 909.04344957715 |
| fast-route(char_count)  | benchLast    | 300    | 0.334050 seconds | 898.06931233661 |
| fast-route(group_pos)   | benchLongest | 300    | 0.371942 seconds | 806.57779270621 |
| fast-route(group_count) | benchLongest | 300    | 0.380862 seconds | 787.68688366654 |
| fast-route(mark)        | benchLongest | 300    | 0.381516 seconds | 786.33616527987 |
| fast-route(char_count)  | benchLongest | 300    | 0.403083 seconds | 744.26342957426 |
| symfony                 | benchAll     | 364    | 0.498623 seconds | 730.01060354522 |
| symfony                 | benchLongest | 300    | 0.489419 seconds | 612.9714293787  |
| symfony                 | benchLast    | 300    | 0.587448 seconds | 510.68339437388 |
| hack-routing            | benchAll     | 364    | 2.310514 seconds | 157.54070488922 |
| hack-routing            | benchLast    | 300    | 1.930410 seconds | 155.40740788314 |
| hack-routing            | benchLongest | 300    | 1.990873 seconds | 150.6876737507  |
+-------------------------+--------------+--------+------------------+-----------------+
```