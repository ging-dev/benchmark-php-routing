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

There are a few scripts to assist with some of the grunt work:

* [scripts/download-bitbucket-routes.php](scripts/download-bitbucket-routes.php):
	downloads the path definitions from [Bitbucket API](https://developer.atlassian.com/bitbucket/api/2/reference/resource/) page
* [scripts/generate-routes.php](scripts/generate-routes.php):
	generates the routes definitions for the packages, as well as the expected results
* [scripts/quick-benchmark.php](scripts/quick-benchmark.php):
	runs the benchmark cases to calculate number of matches per second (more is better)

# Results

Here are the results from the benchmarks executed by GitHub Actions:

https://github.com/kktsvetkov/benchmark-php-routing/actions

## Cached - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents a production environment when using a traditional web server with PHP fpm/fast-cgi

```sh
+--------------------------------------+--------------+--------+------------------+-----------------+
| Case                                 | Scenario     | Routes | Time             | Per Second      |
+--------------------------------------+--------------+--------+------------------+-----------------+
| fast-route(char_count):cached(file)  | benchAll     | 364    | 0.005159 seconds | 70557.660412238 |
| fast-route(group_count):cached(file) | benchAll     | 364    | 0.005534 seconds | 65775.996553358 |
| fast-route(mark):cached(file)        | benchAll     | 364    | 0.005814 seconds | 62606.686459444 |
| fast-route(char_count):cached(file)  | benchLast    | 300    | 0.005014 seconds | 59830.307641101 |
| fast-route(group_pos):cached(file)   | benchAll     | 364    | 0.006179 seconds | 58910.582497299 |
| fast-route(group_count):cached(file) | benchLast    | 300    | 0.005349 seconds | 56086.079786048 |
| fast-route(group_pos):cached(file)   | benchLast    | 300    | 0.005434 seconds | 55207.581607582 |
| fast-route(mark):cached(file)        | benchLast    | 300    | 0.005588 seconds | 53688.236549047 |
| fast-route(group_count):cached(file) | benchLongest | 300    | 0.053454 seconds | 5612.3103272941 |
| fast-route(group_pos):cached(file)   | benchLongest | 300    | 0.066180 seconds | 4533.0922007789 |
| fast-route(char_count):cached(file)  | benchLongest | 300    | 0.066930 seconds | 4482.2912102592 |
| fast-route(mark):cached(file)        | benchLongest | 300    | 0.068012 seconds | 4410.9863529445 |
| hack-routing:cached(apcu)            | benchAll     | 364    | 0.100586 seconds | 3618.7961165049 |
| hack-routing:cached(apcu)            | benchLast    | 300    | 0.085904 seconds | 3492.265506178  |
| hack-routing:cached(file)            | benchLast    | 300    | 0.108952 seconds | 2753.5110082128 |
| hack-routing:cached(file)            | benchAll     | 364    | 0.143426 seconds | 2537.8951413961 |
| hack-routing:cached(apcu)            | benchLongest | 300    | 0.137411 seconds | 2183.2332482567 |
| hack-routing:cached(file)            | benchLongest | 300    | 0.191708 seconds | 1564.8792038623 |
| symfony:cached(file)                 | benchAll     | 364    | 0.309186 seconds | 1177.2849400842 |
| symfony:cached(file)                 | benchLast    | 300    | 0.272055 seconds | 1102.7185624859 |
| symfony:cached(file)                 | benchLongest | 300    | 0.305826 seconds | 980.95011643163 |
+--------------------------------------+--------------+--------+------------------+-----------------+
```

## Instances - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents a production environment when using a long-running-process server such as Amphp, ReactPHP, Roadrunner, etc.

```sh
+----------------------------------+--------------+--------+------------------+-----------------+
| Case                             | Scenario     | Routes | Time             | Per Second      |
+----------------------------------+--------------+--------+------------------+-----------------+
| symfony:instance                 | benchAll     | 364    | 0.001548 seconds | 235134.24549516 |
| hack-routing:instance            | benchLast    | 300    | 0.001429 seconds | 209925.12512512 |
| symfony:instance                 | benchLast    | 300    | 0.001493 seconds | 200940.78569147 |
| fast-route(group_pos):instance   | benchAll     | 364    | 0.003255 seconds | 111823.53006665 |
| fast-route(group_count):instance | benchAll     | 364    | 0.003560 seconds | 102252.13689639 |
| fast-route(mark):instance        | benchAll     | 364    | 0.003910 seconds | 93093.088780488 |
| fast-route(mark):instance        | benchLast    | 300    | 0.003258 seconds | 92081.317233808 |
| fast-route(char_count):instance  | benchAll     | 364    | 0.003985 seconds | 91344.181883451 |
| hack-routing:instance            | benchAll     | 364    | 0.004190 seconds | 86874.16956868  |
| fast-route(char_count):instance  | benchLast    | 300    | 0.003669 seconds | 81765.624796934 |
| fast-route(group_pos):instance   | benchLast    | 300    | 0.004048 seconds | 74108.675422581 |
| fast-route(group_count):instance | benchLast    | 300    | 0.004202 seconds | 71392.408510639 |
| hack-routing:instance            | benchLongest | 300    | 0.050399 seconds | 5952.491378454  |
| fast-route(group_count):instance | benchLongest | 300    | 0.054269 seconds | 5528.0344433705 |
| fast-route(mark):instance        | benchLongest | 300    | 0.063621 seconds | 4715.4208794585 |
| fast-route(char_count):instance  | benchLongest | 300    | 0.063861 seconds | 4697.710676045  |
| fast-route(group_pos):instance   | benchLongest | 300    | 0.066711 seconds | 4497.0129303875 |
| symfony:instance                 | benchLongest | 300    | 0.076024 seconds | 3946.1193973682 |
+----------------------------------+--------------+--------+------------------+-----------------+
```

## Raw ( No Caching ) - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents development environment

```sh
+-------------------------+--------------+--------+------------------+-----------------+
| Case                    | Scenario     | Routes | Time             | Per Second      |
+-------------------------+--------------+--------+------------------+-----------------+
| fast-route(group_count) | benchAll     | 364    | 0.326975 seconds | 1113.2354035782 |
| fast-route(group_pos)   | benchAll     | 364    | 0.333525 seconds | 1091.3726493222 |
| fast-route(group_pos)   | benchLast    | 300    | 0.276078 seconds | 1086.6494811975 |
| fast-route(mark)        | benchLast    | 300    | 0.283820 seconds | 1057.0073956594 |
| fast-route(char_count)  | benchAll     | 364    | 0.346364 seconds | 1050.917467214  |
| fast-route(mark)        | benchAll     | 364    | 0.350720 seconds | 1037.8644688371 |
| fast-route(char_count)  | benchLast    | 300    | 0.293362 seconds | 1022.6268438376 |
| fast-route(group_count) | benchLast    | 300    | 0.309721 seconds | 968.6137095632  |
| fast-route(group_pos)   | benchLongest | 300    | 0.319131 seconds | 940.05313283508 |
| fast-route(char_count)  | benchLongest | 300    | 0.330630 seconds | 907.35850321937 |
| fast-route(group_count) | benchLongest | 300    | 0.357817 seconds | 838.41755658509 |
| fast-route(mark)        | benchLongest | 300    | 0.363120 seconds | 826.17298606204 |
| symfony                 | benchAll     | 364    | 0.475975 seconds | 764.74637181343 |
| symfony                 | benchLongest | 300    | 0.411902 seconds | 728.32866994435 |
| symfony                 | benchLast    | 300    | 0.661517 seconds | 453.50314981999 |
| hack-routing            | benchLast    | 300    | 2.573421 seconds | 116.57633936802 |
| hack-routing            | benchAll     | 364    | 3.208348 seconds | 113.45402554116 |
| hack-routing            | benchLongest | 300    | 2.650159 seconds | 113.20074997483 |
+-------------------------+--------------+--------+------------------+-----------------+
```