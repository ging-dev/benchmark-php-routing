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
| hack-routing:cached(apcu)            | benchAll     | 364    | 0.062711 seconds | 5804.4042900212 |
| hack-routing:cached(apcu)            | benchLast    | 300    | 0.058096 seconds | 5163.8727469713 |
| hack-routing:cached(apcu)            | benchLongest | 300    | 0.091959 seconds | 3262.3234397362 |
| hack-routing:cached(file)            | benchLast    | 300    | 0.114034 seconds | 2630.7957674481 |
| hack-routing:cached(file)            | benchAll     | 364    | 0.139894 seconds | 2601.969902413  |
| fast-route(mark):cached(file)        | benchLast    | 300    | 0.134784 seconds | 2225.7798155401 |
| fast-route(group_pos):cached(file)   | benchLast    | 300    | 0.138804 seconds | 2161.3216394761 |
| fast-route(group_pos):cached(file)   | benchAll     | 364    | 0.172261 seconds | 2113.0726088731 |
| fast-route(char_count):cached(file)  | benchLast    | 300    | 0.143844 seconds | 2085.5908745852 |
| fast-route(char_count):cached(file)  | benchAll     | 364    | 0.177352 seconds | 2052.4160953288 |
| fast-route(mark):cached(file)        | benchAll     | 364    | 0.190084 seconds | 1914.9430632032 |
| fast-route(group_count):cached(file) | benchLast    | 300    | 0.157413 seconds | 1905.8145698975 |
| hack-routing:cached(file)            | benchLongest | 300    | 0.160584 seconds | 1868.1814537561 |
| fast-route(mark):cached(file)        | benchLongest | 300    | 0.172731 seconds | 1736.8054041072 |
| fast-route(group_count):cached(file) | benchAll     | 364    | 0.209652 seconds | 1736.2109208683 |
| fast-route(group_pos):cached(file)   | benchLongest | 300    | 0.177259 seconds | 1692.4390499786 |
| fast-route(group_count):cached(file) | benchLongest | 300    | 0.178499 seconds | 1680.6818409492 |
| fast-route(char_count):cached(file)  | benchLongest | 300    | 0.182353 seconds | 1645.1605817657 |
| symfony:cached(file)                 | benchAll     | 364    | 0.235754 seconds | 1543.9837625136 |
| symfony:cached(file)                 | benchLast    | 300    | 0.197746 seconds | 1517.0973960914 |
| symfony:cached(file)                 | benchLongest | 300    | 0.215139 seconds | 1394.447879888  |
+--------------------------------------+--------------+--------+------------------+-----------------+
```

## Instances - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents a production environment when using a long-running-process server such as Amphp, ReactPHP, Roadrunner, etc.

```sh
 +---------------------------- Benchmark results for group instance. ----------+-----------------+
| Case                             | Scenario     | Routes | Time             | Per Second      |
+----------------------------------+--------------+--------+------------------+-----------------+
| symfony:instance                 | benchAll     | 364    | 0.000526 seconds | 692079.17316409 |
| fast-route(mark):instance        | benchAll     | 364    | 0.000680 seconds | 535317.90182328 |
| fast-route(char_count):instance  | benchAll     | 364    | 0.000754 seconds | 482835.75458571 |
| symfony:instance                 | benchLast    | 300    | 0.000795 seconds | 377411.87762447 |
| fast-route(group_pos):instance   | benchAll     | 364    | 0.001015 seconds | 358554.87458899 |
| fast-route(mark):instance        | benchLast    | 300    | 0.000879 seconds | 341277.78681855 |
| fast-route(group_count):instance | benchAll     | 364    | 0.001116 seconds | 326223.64444445 |
| fast-route(char_count):instance  | benchLast    | 300    | 0.001015 seconds | 295581.67723748 |
| hack-routing:instance            | benchAll     | 364    | 0.001297 seconds | 280648.28235294 |
| hack-routing:instance            | benchLast    | 300    | 0.001280 seconds | 234362.30210467 |
| fast-route(group_count):instance | benchLast    | 300    | 0.001476 seconds | 203245.22694233 |
| fast-route(group_pos):instance   | benchLast    | 300    | 0.001966 seconds | 152594.13048751 |
| fast-route(char_count):instance  | benchLongest | 300    | 0.037956 seconds | 7903.8888435228 |
| fast-route(mark):instance        | benchLongest | 300    | 0.038175 seconds | 7858.5243383005 |
| fast-route(group_pos):instance   | benchLongest | 300    | 0.038239 seconds | 7845.3929894131 |
| fast-route(group_count):instance | benchLongest | 300    | 0.038826 seconds | 7726.7832580075 |
| hack-routing:instance            | benchLongest | 300    | 0.039287 seconds | 7636.1425164308 |
| symfony:instance                 | benchLongest | 300    | 0.043329 seconds | 6923.7692244202 |
+----------------------------------+--------------+--------+------------------+-----------------+
```

## Raw ( No Caching ) - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents development environment

```sh
+-------------------------+ Benchmark results for group raw. --------+-----------------+
| Case                    | Scenario     | Routes | Time             | Per Second      |
+-------------------------+--------------+--------+------------------+-----------------+
| fast-route(group_pos)   | benchAll     | 364    | 0.257070 seconds | 1415.9563877837 |
| fast-route(mark)        | benchAll     | 364    | 0.259738 seconds | 1401.4123625416 |
| fast-route(group_pos)   | benchLast    | 300    | 0.217265 seconds | 1380.8029409344 |
| fast-route(group_count) | benchAll     | 364    | 0.264793 seconds | 1374.6591153426 |
| fast-route(char_count)  | benchAll     | 364    | 0.267612 seconds | 1360.1782678187 |
| fast-route(char_count)  | benchLast    | 300    | 0.222796 seconds | 1346.5234987812 |
| fast-route(group_count) | benchLast    | 300    | 0.247242 seconds | 1213.3850333025 |
| fast-route(group_pos)   | benchLongest | 300    | 0.260258 seconds | 1152.7024984404 |
| fast-route(group_count) | benchLongest | 300    | 0.262894 seconds | 1141.1447077378 |
| fast-route(char_count)  | benchLongest | 300    | 0.274381 seconds | 1093.3704773135 |
| fast-route(mark)        | benchLast    | 300    | 0.729359 seconds | 411.31999239005 |
| fast-route(mark)        | benchLongest | 300    | 0.870114 seconds | 344.78246740258 |
| hack-routing            | benchAll     | 364    | 1.698424 seconds | 214.3163482603  |
| hack-routing            | benchLongest | 300    | 1.413687 seconds | 212.21104952194 |
| hack-routing            | benchLast    | 300    | 1.423885 seconds | 210.69115655234 |
| symfony                 | benchAll     | 364    | 1.831126 seconds | 198.78479418574 |
| symfony                 | benchLast    | 300    | 1.519589 seconds | 197.42177874141 |
| symfony                 | benchLongest | 300    | 1.760738 seconds | 170.38311078974 |
+-------------------------+--------------+--------+------------------+-----------------+
```