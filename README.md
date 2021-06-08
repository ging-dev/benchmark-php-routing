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
| hack-routing:cached(apcu)            | benchAll     | 364    | 0.080318 seconds | 4531.9868201545 |
| hack-routing:cached(apcu)            | benchLast    | 300    | 0.086531 seconds | 3466.9686474512 |
| hack-routing:cached(apcu)            | benchLongest | 300    | 0.106990 seconds | 2803.9977804964 |
| hack-routing:cached(file)            | benchLast    | 300    | 0.116374 seconds | 2577.8950560121 |
| hack-routing:cached(file)            | benchAll     | 364    | 0.142162 seconds | 2560.4619652171 |
| fast-route(mark):cached(file)        | benchLast    | 300    | 0.145138 seconds | 2066.9979449794 |
| fast-route(group_pos):cached(file)   | benchAll     | 364    | 0.188338 seconds | 1932.6950491615 |
| fast-route(group_pos):cached(file)   | benchLast    | 300    | 0.156230 seconds | 1920.2461252968 |
| fast-route(group_count):cached(file) | benchLast    | 300    | 0.156979 seconds | 1911.0826253232 |
| fast-route(group_count):cached(file) | benchAll     | 364    | 0.192558 seconds | 1890.3390416853 |
| fast-route(char_count):cached(file)  | benchLast    | 300    | 0.158794 seconds | 1889.2410251791 |
| hack-routing:cached(file)            | benchLongest | 300    | 0.160693 seconds | 1866.9147397236 |
| fast-route(char_count):cached(file)  | benchAll     | 364    | 0.199608 seconds | 1823.5734057001 |
| fast-route(mark):cached(file)        | benchAll     | 364    | 0.219012 seconds | 1662.0092205229 |
| fast-route(mark):cached(file)        | benchLongest | 300    | 0.186764 seconds | 1606.3052677939 |
| fast-route(group_pos):cached(file)   | benchLongest | 300    | 0.189464 seconds | 1583.4154849378 |
| fast-route(char_count):cached(file)  | benchLongest | 300    | 0.193903 seconds | 1547.1636773644 |
| fast-route(group_count):cached(file) | benchLongest | 300    | 0.194397 seconds | 1543.2339089482 |
| symfony:cached(file)                 | benchLast    | 300    | 0.227143 seconds | 1320.7536000051 |
| symfony:cached(file)                 | benchAll     | 364    | 0.279221 seconds | 1303.6266059166 |
| symfony:cached(file)                 | benchLongest | 300    | 0.274030 seconds | 1094.7698122269 |
+--------------------------------------+--------------+--------+------------------+-----------------+
```

## Instances - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents a production environment when using a long-running-process server such as Amphp, ReactPHP, Roadrunner, etc.

```sh
+---------------------------- Benchmark results for group instance. ----------+-----------------+
| Case                             | Scenario     | Routes | Time             | Per Second      |
+----------------------------------+--------------+--------+------------------+-----------------+
| symfony:instance                 | benchAll     | 364    | 0.000408 seconds | 892300.792519   |
| fast-route(mark):instance        | benchAll     | 364    | 0.000757 seconds | 480858.78929134 |
| fast-route(char_count):instance  | benchAll     | 364    | 0.000777 seconds | 468464.76096962 |
| fast-route(group_pos):instance   | benchAll     | 364    | 0.001000 seconds | 364026.38435861 |
| fast-route(group_count):instance | benchAll     | 364    | 0.001062 seconds | 342699.58608304 |
| fast-route(mark):instance        | benchLast    | 300    | 0.000925 seconds | 324301.8556701  |
| symfony:instance                 | benchLast    | 300    | 0.000934 seconds | 321156.50842267 |
| fast-route(char_count):instance  | benchLast    | 300    | 0.000967 seconds | 310229.58579882 |
| hack-routing:instance            | benchLast    | 300    | 0.001120 seconds | 267835.50447    |
| hack-routing:instance            | benchAll     | 364    | 0.001509 seconds | 241227.15373677 |
| fast-route(group_count):instance | benchLast    | 300    | 0.001378 seconds | 217697.43944637 |
| fast-route(group_pos):instance   | benchLast    | 300    | 0.001514 seconds | 198156.09448819 |
| fast-route(char_count):instance  | benchLongest | 300    | 0.038646 seconds | 7762.7732227794 |
| symfony:instance                 | benchLongest | 300    | 0.039266 seconds | 7640.2227174196 |
| fast-route(mark):instance        | benchLongest | 300    | 0.039362 seconds | 7621.5729030381 |
| fast-route(group_pos):instance   | benchLongest | 300    | 0.039676 seconds | 7561.2554307657 |
| hack-routing:instance            | benchLongest | 300    | 0.041959 seconds | 7149.8286824745 |
| fast-route(group_count):instance | benchLongest | 300    | 0.042801 seconds | 7009.1588170743 |
+----------------------------------+--------------+--------+------------------+-----------------+
```

## Raw ( No Caching ) - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents development environment

```sh
+-------------------------+ Benchmark results for group raw. --------+-----------------+
| Case                    | Scenario     | Routes | Time             | Per Second      |
+-------------------------+--------------+--------+------------------+-----------------+
| fast-route(group_pos)   | benchAll     | 364    | 0.297895 seconds | 1221.9072336734 |
| fast-route(group_pos)   | benchLast    | 300    | 0.246028 seconds | 1219.3736699499 |
| fast-route(mark)        | benchAll     | 364    | 0.298884 seconds | 1217.8641331834 |
| fast-route(group_count) | benchAll     | 364    | 0.305747 seconds | 1190.5266828655 |
| fast-route(mark)        | benchLast    | 300    | 0.253073 seconds | 1185.4277009344 |
| fast-route(group_count) | benchLast    | 300    | 0.254630 seconds | 1178.1796935569 |
| fast-route(char_count)  | benchAll     | 364    | 0.312191 seconds | 1165.9528586615 |
| fast-route(char_count)  | benchLast    | 300    | 0.260763 seconds | 1150.4702761861 |
| symfony                 | benchAll     | 364    | 0.356364 seconds | 1021.4274954355 |
| fast-route(char_count)  | benchLongest | 300    | 0.293916 seconds | 1020.6998368718 |
| fast-route(group_count) | benchLongest | 300    | 0.294055 seconds | 1020.2173581675 |
| fast-route(mark)        | benchLongest | 300    | 0.294197 seconds | 1019.7245922046 |
| fast-route(group_pos)   | benchLongest | 300    | 0.298332 seconds | 1005.5911675504 |
| symfony                 | benchLongest | 300    | 0.326700 seconds | 918.27372381829 |
| symfony                 | benchLast    | 300    | 0.446881 seconds | 671.31957393343 |
| hack-routing            | benchAll     | 364    | 1.782068 seconds | 204.25707498861 |
| hack-routing            | benchLast    | 300    | 1.493130 seconds | 200.92021880226 |
| hack-routing            | benchLongest | 300    | 1.554661 seconds | 192.96813848778 |
+-------------------------+--------------+--------+------------------+-----------------+
```