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
 +------------------------------- Benchmark results for group cached. -------------+-----------------+
| Case                                 | Scenario     | Routes | Time             | Per Second      |
+--------------------------------------+--------------+--------+------------------+-----------------+
| hack-routing:cached(apcu)            | benchLast    | 300    | 0.075282 seconds | 3985.0238317683 |
| hack-routing:cached(apcu)            | benchAll     | 364    | 0.095433 seconds | 3814.1943813628 |
| hack-routing:cached(apcu)            | benchLongest | 300    | 0.123588 seconds | 2427.423147782  |
| hack-routing:cached(file)            | benchLast    | 300    | 0.131196 seconds | 2286.6546969158 |
| hack-routing:cached(file)            | benchAll     | 364    | 0.162694 seconds | 2237.3292848057 |
| fast-route(mark):cached(file)        | benchLast    | 300    | 0.151944 seconds | 1974.4095402479 |
| fast-route(mark):cached(file)        | benchAll     | 364    | 0.189643 seconds | 1919.396867064  |
| fast-route(group_pos):cached(file)   | benchLast    | 300    | 0.158107 seconds | 1897.4486880023 |
| fast-route(group_count):cached(file) | benchLast    | 300    | 0.161254 seconds | 1860.4197838983 |
| fast-route(group_pos):cached(file)   | benchAll     | 364    | 0.196494 seconds | 1852.4751484854 |
| fast-route(group_count):cached(file) | benchAll     | 364    | 0.197653 seconds | 1841.610794471  |
| fast-route(char_count):cached(file)  | benchLast    | 300    | 0.163568 seconds | 1834.0993566105 |
| fast-route(char_count):cached(file)  | benchAll     | 364    | 0.203403 seconds | 1789.5508278887 |
| hack-routing:cached(file)            | benchLongest | 300    | 0.182080 seconds | 1647.6271410595 |
| fast-route(mark):cached(file)        | benchLongest | 300    | 0.195373 seconds | 1535.5238976196 |
| fast-route(group_pos):cached(file)   | benchLongest | 300    | 0.201282 seconds | 1490.4460590497 |
| fast-route(group_count):cached(file) | benchLongest | 300    | 0.203045 seconds | 1477.5057771432 |
| fast-route(char_count):cached(file)  | benchLongest | 300    | 0.205579 seconds | 1459.2927199537 |
| symfony:cached(file)                 | benchAll     | 364    | 0.301542 seconds | 1207.1294714088 |
| symfony:cached(file)                 | benchLast    | 300    | 0.250172 seconds | 1199.1754479428 |
| symfony:cached(file)                 | benchLongest | 300    | 0.299208 seconds | 1002.6472367046 |
+--------------------------------------+--------------+--------+------------------+-----------------+
```

## Instances - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents a production environment when using a long-running-process server such as Amphp, ReactPHP, Roadrunner, etc.

```sh
+---------------------------- Benchmark results for group instance. ----------+-----------------+
| Case                             | Scenario     | Routes | Time             | Per Second      |
+----------------------------------+--------------+--------+------------------+-----------------+
| symfony:instance                 | benchAll     | 364    | 0.002802 seconds | 129912.07079646 |
| symfony:instance                 | benchLast    | 300    | 0.003160 seconds | 94936.713444998 |
| fast-route(mark):instance        | benchAll     | 364    | 0.003898 seconds | 93383.488653741 |
| hack-routing:instance            | benchLast    | 300    | 0.003365 seconds | 89151.990930989 |
| fast-route(char_count):instance  | benchAll     | 364    | 0.004298 seconds | 84691.110889221 |
| fast-route(group_pos):instance   | benchAll     | 364    | 0.004327 seconds | 84121.80593972  |
| hack-routing:instance            | benchAll     | 364    | 0.004635 seconds | 78531.282135692 |
| fast-route(mark):instance        | benchLast    | 300    | 0.003989 seconds | 75202.677504184 |
| fast-route(group_count):instance | benchAll     | 364    | 0.004889 seconds | 74452.679996099 |
| fast-route(char_count):instance  | benchLast    | 300    | 0.004496 seconds | 66724.530703149 |
| fast-route(group_pos):instance   | benchLast    | 300    | 0.004524 seconds | 66313.106719368 |
| fast-route(group_count):instance | benchLast    | 300    | 0.005110 seconds | 58710.862262038 |
| symfony:instance                 | benchLongest | 300    | 0.046077 seconds | 6510.8387103451 |
| fast-route(group_count):instance | benchLongest | 300    | 0.046686 seconds | 6425.9183412916 |
| fast-route(char_count):instance  | benchLongest | 300    | 0.046895 seconds | 6397.2667927521 |
| fast-route(group_pos):instance   | benchLongest | 300    | 0.047052 seconds | 6375.937167469  |
| fast-route(mark):instance        | benchLongest | 300    | 0.047604 seconds | 6301.9803071128 |
| hack-routing:instance            | benchLongest | 300    | 0.047939 seconds | 6257.9447060989 |
+----------------------------------+--------------+--------+------------------+-----------------+
```

## Raw ( No Caching ) - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents development environment

```sh
 +-------------------------+ Benchmark results for group raw. --------+-----------------+
| Case                    | Scenario     | Routes | Time             | Per Second      |
+-------------------------+--------------+--------+------------------+-----------------+
| fast-route(mark)        | benchAll     | 364    | 0.297299 seconds | 1224.3570020578 |
| fast-route(mark)        | benchLast    | 300    | 0.246221 seconds | 1218.4184560265 |
| fast-route(group_count) | benchAll     | 364    | 0.298960 seconds | 1217.5543080988 |
| fast-route(group_pos)   | benchLast    | 300    | 0.248437 seconds | 1207.5499510566 |
| fast-route(group_count) | benchLast    | 300    | 0.250587 seconds | 1197.1890645248 |
| fast-route(char_count)  | benchLast    | 300    | 0.253661 seconds | 1182.6800960964 |
| fast-route(char_count)  | benchAll     | 364    | 0.308540 seconds | 1179.7493847128 |
| fast-route(group_pos)   | benchAll     | 364    | 0.317483 seconds | 1146.5182679744 |
| symfony                 | benchAll     | 364    | 0.347031 seconds | 1048.8972968368 |
| fast-route(mark)        | benchLongest | 300    | 0.291041 seconds | 1030.7829680007 |
| fast-route(group_pos)   | benchLongest | 300    | 0.295063 seconds | 1016.7319551642 |
| fast-route(group_count) | benchLongest | 300    | 0.295874 seconds | 1013.9455351999 |
| fast-route(char_count)  | benchLongest | 300    | 0.303998 seconds | 986.84861888852 |
| symfony                 | benchLongest | 300    | 0.334684 seconds | 896.36755957364 |
| symfony                 | benchLast    | 300    | 0.452011 seconds | 663.70085306437 |
| hack-routing            | benchAll     | 364    | 2.235271 seconds | 162.84379108488 |
| hack-routing            | benchLast    | 300    | 1.872519 seconds | 160.21199111678 |
| hack-routing            | benchLongest | 300    | 1.886756 seconds | 159.00307671779 |
+-------------------------+--------------+--------+------------------+-----------------+
```