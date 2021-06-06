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
| hack-routing:cached(apcu)            | benchAll     | 364    | 0.107692 seconds | 3380.0095551625 |
| hack-routing:cached(apcu)            | benchLast    | 300    | 0.088969 seconds | 3371.9613144926 |
| hack-routing:cached(apcu)            | benchLongest | 300    | 0.138388 seconds | 2167.819296018  |
| hack-routing:cached(file)            | benchLast    | 300    | 0.151346 seconds | 1982.2133584125 |
| hack-routing:cached(file)            | benchAll     | 364    | 0.190353 seconds | 1912.2351806553 |
| fast-route(mark):cached(file)        | benchLast    | 300    | 0.171327 seconds | 1751.0387602508 |
| fast-route(mark):cached(file)        | benchAll     | 364    | 0.220589 seconds | 1650.1264091274 |
| fast-route(group_pos):cached(file)   | benchLast    | 300    | 0.182035 seconds | 1648.0349962673 |
| fast-route(group_count):cached(file) | benchLast    | 300    | 0.183901 seconds | 1631.3118649825 |
| fast-route(group_pos):cached(file)   | benchAll     | 364    | 0.228924 seconds | 1590.0471017323 |
| fast-route(char_count):cached(file)  | benchAll     | 364    | 0.230335 seconds | 1580.3069636009 |
| fast-route(char_count):cached(file)  | benchLast    | 300    | 0.190496 seconds | 1574.8364826946 |
| fast-route(group_count):cached(file) | benchAll     | 364    | 0.251857 seconds | 1445.2643319307 |
| hack-routing:cached(file)            | benchLongest | 300    | 0.219810 seconds | 1364.81501166   |
| fast-route(mark):cached(file)        | benchLongest | 300    | 0.222862 seconds | 1346.12447593   |
| fast-route(group_pos):cached(file)   | benchLongest | 300    | 0.231586 seconds | 1295.4152090613 |
| fast-route(char_count):cached(file)  | benchLongest | 300    | 0.237580 seconds | 1262.7334964405 |
| fast-route(group_count):cached(file) | benchLongest | 300    | 0.253114 seconds | 1185.236761718  |
| symfony:cached(file)                 | benchAll     | 364    | 0.341145 seconds | 1066.9955977678 |
| symfony:cached(file)                 | benchLast    | 300    | 0.290255 seconds | 1033.5736780629 |
| symfony:cached(file)                 | benchLongest | 300    | 0.333453 seconds | 899.67717786964 |
+--------------------------------------+--------------+--------+------------------+-----------------+
```

## Instances - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents a production environment when using a long-running-process server such as Amphp, ReactPHP, Roadrunner, etc.

```sh
 +---------------------------- Benchmark results for group instance. ----------+-----------------+
| Case                             | Scenario     | Routes | Time             | Per Second      |
+----------------------------------+--------------+--------+------------------+-----------------+
| hack-routing:instance            | benchLast    | 300    | 0.002647 seconds | 113339.1460998  |
| symfony:instance                 | benchAll     | 364    | 0.003324 seconds | 109505.56993258 |
| symfony:instance                 | benchLast    | 300    | 0.003463 seconds | 86629.342512909 |
| fast-route(mark):instance        | benchAll     | 364    | 0.004383 seconds | 83051.006690965 |
| hack-routing:instance            | benchAll     | 364    | 0.004506 seconds | 80783.462405419 |
| fast-route(group_pos):instance   | benchAll     | 364    | 0.004511 seconds | 80693.797885834 |
| fast-route(char_count):instance  | benchAll     | 364    | 0.005042 seconds | 72192.484206545 |
| fast-route(mark):instance        | benchLast    | 300    | 0.004353 seconds | 68917.252711141 |
| fast-route(group_count):instance | benchAll     | 364    | 0.005334 seconds | 68242.743429286 |
| fast-route(char_count):instance  | benchLast    | 300    | 0.005268 seconds | 56946.560463433 |
| fast-route(group_pos):instance   | benchLast    | 300    | 0.005370 seconds | 55866.944900768 |
| fast-route(group_count):instance | benchLast    | 300    | 0.005786 seconds | 51847.673987391 |
| hack-routing:instance            | benchLongest | 300    | 0.051594 seconds | 5814.6543438078 |
| fast-route(group_pos):instance   | benchLongest | 300    | 0.053945 seconds | 5561.2131069291 |
| fast-route(mark):instance        | benchLongest | 300    | 0.054542 seconds | 5500.3418340138 |
| fast-route(char_count):instance  | benchLongest | 300    | 0.054585 seconds | 5496.0174014834 |
| fast-route(group_count):instance | benchLongest | 300    | 0.054709 seconds | 5483.5627064576 |
| symfony:instance                 | benchLongest | 300    | 0.054917 seconds | 5462.7796421796 |
+----------------------------------+--------------+--------+------------------+-----------------+
```

## Raw ( No Caching ) - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents development environment

```sh
+-------------------------+ Benchmark results for group raw. --------+-----------------+
| Case                    | Scenario     | Routes | Time             | Per Second      |
+-------------------------+--------------+--------+------------------+-----------------+
| fast-route(mark)        | benchLast    | 300    | 0.282793 seconds | 1060.8464573567 |
| fast-route(group_count) | benchAll     | 364    | 0.343468 seconds | 1059.7786463919 |
| fast-route(group_pos)   | benchAll     | 364    | 0.345849 seconds | 1052.4823286428 |
| fast-route(mark)        | benchAll     | 364    | 0.347313 seconds | 1048.0462183951 |
| fast-route(group_count) | benchLast    | 300    | 0.287011 seconds | 1045.2564397567 |
| fast-route(group_pos)   | benchLast    | 300    | 0.295975 seconds | 1013.5992247519 |
| fast-route(char_count)  | benchAll     | 364    | 0.362265 seconds | 1004.7890065484 |
| fast-route(char_count)  | benchLast    | 300    | 0.301414 seconds | 995.30873533286 |
| fast-route(group_count) | benchLongest | 300    | 0.334285 seconds | 897.43775912153 |
| symfony                 | benchAll     | 364    | 0.412941 seconds | 881.4819030023  |
| fast-route(mark)        | benchLongest | 300    | 0.341854 seconds | 877.56737153379 |
| fast-route(char_count)  | benchLongest | 300    | 0.349031 seconds | 859.5225767141  |
| fast-route(group_pos)   | benchLongest | 300    | 0.365045 seconds | 821.81686607551 |
| symfony                 | benchLongest | 300    | 0.391312 seconds | 766.65143467119 |
| symfony                 | benchLast    | 300    | 0.538517 seconds | 557.0854791066  |
| hack-routing            | benchLast    | 300    | 2.108805 seconds | 142.26066818323 |
| hack-routing            | benchAll     | 364    | 2.613556 seconds | 139.27383977211 |
| hack-routing            | benchLongest | 300    | 2.185613 seconds | 137.2612678457  |
+-------------------------+--------------+--------+------------------+-----------------+
```