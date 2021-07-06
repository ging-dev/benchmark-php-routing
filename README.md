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
| [nikic/FastRoute](https://github.com/nikic/FastRoute) | benchmark/FastRoute/FastRouteMarkBased.php | `FastRoute\Dispatcher\MarkBased` |
| [nikic/FastRoute](https://github.com/nikic/FastRoute) | benchmark/FastRoute/FastRouteMarkBasedApcuCached.php | `FastRoute\Dispatcher\MarkBased` |
| [nikic/FastRoute](https://github.com/nikic/FastRoute) | benchmark/FastRoute/FastRouteMarkBasedFilesCached.php | `FastRoute\Dispatcher\MarkBased` |
| [nikic/FastRoute](https://github.com/nikic/FastRoute) | benchmark/FastRoute/FastRouteMarkBasedInstance.php | `FastRoute\Dispatcher\MarkBased` |
| [azjezz/hack-routing](https://github.com/azjezz/hack-routing) | benchmark/HackRouting/HackRouting.php | `HackRouting\PrefixMatchingResolver` |
| [azjezz/hack-routing](https://github.com/azjezz/hack-routing) | benchmark/HackRouting/HackRoutingFilesCached.php | `HackRouting\PrefixMatchingResolver` |
| [azjezz/hack-routing](https://github.com/azjezz/hack-routing) | benchmark/HackRouting/HackRoutingApcuCached.php | `HackRouting\PrefixMatchingResolver` |
| [azjezz/hack-routing](https://github.com/azjezz/hack-routing) | benchmark/HackRouting/HackRoutingInstance.php | `HackRouting\PrefixMatchingResolver` |

The benchmark cases are:

* **benchLast** -- match the last route in the list of routing definitions, as this is considered the worst case
* **benchLongest** -- match the longest route to test the complexity of parsing bigger paths
* **benchAll** -- match all the routes from the list of routing definitions to average the overall performance
* **benchInvalidMethod** -- match a valid route with using an invalid method, requiring routers to provide a list of allowed methods
* **benchInvalidRoute** -- match a non-registered route, requiring routers to go over all possibilities

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
+------------------------------ Benchmark results for group cached. -------------+-----------------+
| Case                          | Scenario           | Routes | Time             | Per Second      |
+-------------------------------+--------------------+--------+------------------+-----------------+
| fast-route(mark):cached(file) | benchAll           | 364    | 0.004870 seconds | 74744.279643592 |
| fast-route(mark):cached(file) | benchInvalidRoute  | 300    | 0.004553 seconds | 65889.469550192 |
| fast-route(mark):cached(file) | benchLast          | 300    | 0.005257 seconds | 57065.360544217 |
| fast-route(mark):cached(file) | benchInvalidMethod | 300    | 0.005323 seconds | 56359.903251814 |
| symfony:cached(file)          | benchAll           | 364    | 0.006487 seconds | 56111.090301003 |
| symfony:cached(file)          | benchInvalidRoute  | 300    | 0.005843 seconds | 51344.154731301 |
| symfony:cached(file)          | benchLast          | 300    | 0.006613 seconds | 45365.079136172 |
| symfony:cached(file)          | benchInvalidMethod | 300    | 0.007315 seconds | 41010.7294179   |
| fast-route(mark):cached(apcu) | benchAll           | 364    | 0.031983 seconds | 11381.082223846 |
| fast-route(mark):cached(apcu) | benchInvalidMethod | 300    | 0.028041 seconds | 10698.57243672  |
| fast-route(mark):cached(apcu) | benchLast          | 300    | 0.028118 seconds | 10669.36193666  |
| fast-route(mark):cached(apcu) | benchInvalidRoute  | 300    | 0.028699 seconds | 10453.354600738 |
| fast-route(mark):cached(file) | benchLongest       | 300    | 0.046776 seconds | 6413.5376899278 |
| symfony:cached(file)          | benchLongest       | 300    | 0.049503 seconds | 6060.2280006357 |
| hack-routing:cached(apcu)     | benchInvalidRoute  | 300    | 0.056479 seconds | 5311.7109206805 |
| hack-routing:cached(apcu)     | benchLast          | 300    | 0.057875 seconds | 5183.5926589631 |
| hack-routing:cached(file)     | benchInvalidRoute  | 300    | 0.058022 seconds | 5170.4506044494 |
| hack-routing:cached(apcu)     | benchAll           | 364    | 0.071355 seconds | 5101.2468249328 |
| hack-routing:cached(apcu)     | benchInvalidMethod | 300    | 0.059413 seconds | 5049.4036822421 |
| hack-routing:cached(file)     | benchLast          | 300    | 0.059460 seconds | 5045.4150677846 |
| hack-routing:cached(file)     | benchInvalidMethod | 300    | 0.060596 seconds | 4950.8227165779 |
| hack-routing:cached(file)     | benchAll           | 364    | 0.073712 seconds | 4938.1302127302 |
| fast-route(mark):cached(apcu) | benchLongest       | 300    | 0.069440 seconds | 4320.2686324261 |
| hack-routing:cached(apcu)     | benchLongest       | 300    | 0.103255 seconds | 2905.4273661169 |
| hack-routing:cached(file)     | benchLongest       | 300    | 0.104504 seconds | 2870.7005352228 |
+-------------------------------+--------------------+--------+------------------+-----------------+
```

## Instances - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents a production environment when using a long-running-process server such as Amphp, ReactPHP, Roadrunner, etc.

```sh
+------------------+------ Benchmark results for group raw. --------+-----------------+
| Case             | Scenario           | Routes | Time             | Per Second      |
+------------------+--------------------+--------+------------------+-----------------+
| fast-route(mark) | benchInvalidMethod | 300    | 0.227458 seconds | 1318.9248114311 |
| fast-route(mark) | benchLast          | 300    | 0.229455 seconds | 1307.4459374649 |
| fast-route(mark) | benchAll           | 364    | 0.278633 seconds | 1306.377371923  |
| fast-route(mark) | benchInvalidRoute  | 300    | 0.233713 seconds | 1283.6261289062 |
| fast-route(mark) | benchLongest       | 300    | 0.273020 seconds | 1098.8204822339 |
| hack-routing     | benchInvalidRoute  | 300    | 1.554080 seconds | 193.04025415279 |
| hack-routing     | benchLast          | 300    | 1.576081 seconds | 190.34554242959 |
| hack-routing     | benchInvalidMethod | 300    | 1.590922 seconds | 188.56991282533 |
| hack-routing     | benchLongest       | 300    | 1.598409 seconds | 187.68661024245 |
| hack-routing     | benchAll           | 364    | 1.941520 seconds | 187.48195221461 |
| symfony          | benchLast          | 300    | 1.693319 seconds | 177.16687030979 |
| symfony          | benchAll           | 364    | 2.086819 seconds | 174.42816631522 |
| symfony          | benchInvalidRoute  | 300    | 1.726330 seconds | 173.77905309019 |
| symfony          | benchInvalidMethod | 300    | 1.733686 seconds | 173.04171870698 |
| symfony          | benchLongest       | 300    | 1.763681 seconds | 170.09879398395 |
+------------------+--------------------+--------+------------------+-----------------+
```

## Raw ( No Caching ) - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents development environment

```sh
+------------------+------ Benchmark results for group raw. --------+-----------------+
| Case             | Scenario           | Routes | Time             | Per Second      |
+------------------+--------------------+--------+------------------+-----------------+
| fast-route(mark) | benchInvalidMethod | 300    | 0.227458 seconds | 1318.9248114311 |
| fast-route(mark) | benchLast          | 300    | 0.229455 seconds | 1307.4459374649 |
| fast-route(mark) | benchAll           | 364    | 0.278633 seconds | 1306.377371923  |
| fast-route(mark) | benchInvalidRoute  | 300    | 0.233713 seconds | 1283.6261289062 |
| fast-route(mark) | benchLongest       | 300    | 0.273020 seconds | 1098.8204822339 |
| hack-routing     | benchInvalidRoute  | 300    | 1.554080 seconds | 193.04025415279 |
| hack-routing     | benchLast          | 300    | 1.576081 seconds | 190.34554242959 |
| hack-routing     | benchInvalidMethod | 300    | 1.590922 seconds | 188.56991282533 |
| hack-routing     | benchLongest       | 300    | 1.598409 seconds | 187.68661024245 |
| hack-routing     | benchAll           | 364    | 1.941520 seconds | 187.48195221461 |
| symfony          | benchLast          | 300    | 1.693319 seconds | 177.16687030979 |
| symfony          | benchAll           | 364    | 2.086819 seconds | 174.42816631522 |
| symfony          | benchInvalidRoute  | 300    | 1.726330 seconds | 173.77905309019 |
| symfony          | benchInvalidMethod | 300    | 1.733686 seconds | 173.04171870698 |
| symfony          | benchLongest       | 300    | 1.763681 seconds | 170.09879398395 |
+------------------+--------------------+--------+------------------+-----------------+
```
