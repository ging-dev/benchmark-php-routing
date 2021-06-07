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
| hack-routing:cached(apcu)            | benchAll     | 364    | 0.115770 seconds | 3144.162397158  |
| hack-routing:cached(apcu)            | benchLast    | 300    | 0.103068 seconds | 2910.6965317985 |
| hack-routing:cached(apcu)            | benchLongest | 300    | 0.144438 seconds | 2077.0153363144 |
| hack-routing:cached(file)            | benchLast    | 300    | 0.151396 seconds | 1981.5578243184 |
| fast-route(mark):cached(file)        | benchLast    | 300    | 0.158446 seconds | 1893.3886672756 |
| hack-routing:cached(file)            | benchAll     | 364    | 0.202926 seconds | 1793.7580331159 |
| fast-route(group_count):cached(file) | benchAll     | 364    | 0.209930 seconds | 1733.9117738583 |
| fast-route(group_count):cached(file) | benchLast    | 300    | 0.177210 seconds | 1692.9081143915 |
| fast-route(char_count):cached(file)  | benchAll     | 364    | 0.216352 seconds | 1682.4435349321 |
| fast-route(group_pos):cached(file)   | benchAll     | 364    | 0.218005 seconds | 1669.6869197565 |
| fast-route(group_pos):cached(file)   | benchLast    | 300    | 0.179724 seconds | 1669.2263506926 |
| fast-route(char_count):cached(file)  | benchLast    | 300    | 0.179966 seconds | 1666.9817919749 |
| fast-route(mark):cached(file)        | benchAll     | 364    | 0.228540 seconds | 1592.7193912573 |
| hack-routing:cached(file)            | benchLongest | 300    | 0.206146 seconds | 1455.279255273  |
| fast-route(mark):cached(file)        | benchLongest | 300    | 0.207395 seconds | 1446.5162316052 |
| fast-route(group_count):cached(file) | benchLongest | 300    | 0.216913 seconds | 1383.0430677545 |
| fast-route(group_pos):cached(file)   | benchLongest | 300    | 0.217958 seconds | 1376.4121367518 |
| fast-route(char_count):cached(file)  | benchLongest | 300    | 0.254296 seconds | 1179.7272629255 |
| symfony:cached(file)                 | benchLast    | 300    | 0.285819 seconds | 1049.6151189678 |
| symfony:cached(file)                 | benchAll     | 364    | 0.359848 seconds | 1011.5381418819 |
| symfony:cached(file)                 | benchLongest | 300    | 0.334219 seconds | 897.61509356434 |
+--------------------------------------+--------------+--------+------------------+-----------------+
```

## Instances - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents a production environment when using a long-running-process server such as Amphp, ReactPHP, Roadrunner, etc.

```sh
 +---------------------------- Benchmark results for group instance. ----------+-----------------+
| Case                             | Scenario     | Routes | Time             | Per Second      |
+----------------------------------+--------------+--------+------------------+-----------------+
| symfony:instance                 | benchAll     | 364    | 0.003154 seconds | 115416.28787421 |
| fast-route(char_count):instance  | benchAll     | 364    | 0.003853 seconds | 94469.813501639 |
| symfony:instance                 | benchLast    | 300    | 0.003379 seconds | 88787.129551229 |
| fast-route(mark):instance        | benchAll     | 364    | 0.004101 seconds | 88758.017324574 |
| hack-routing:instance            | benchLast    | 300    | 0.003435 seconds | 87338.876934824 |
| hack-routing:instance            | benchAll     | 364    | 0.004249 seconds | 85665.282010999 |
| fast-route(mark):instance        | benchLast    | 300    | 0.003945 seconds | 76043.464072036 |
| fast-route(group_count):instance | benchAll     | 364    | 0.004910 seconds | 74134.537049626 |
| fast-route(group_pos):instance   | benchLast    | 300    | 0.004107 seconds | 73046.046673633 |
| fast-route(group_pos):instance   | benchAll     | 364    | 0.005628 seconds | 64675.36456833  |
| fast-route(char_count):instance  | benchLast    | 300    | 0.005078 seconds | 59080.251666823 |
| fast-route(group_count):instance | benchLast    | 300    | 0.005629 seconds | 53294.841168996 |
| fast-route(group_pos):instance   | benchLongest | 300    | 0.046476 seconds | 6454.9601403552 |
| fast-route(char_count):instance  | benchLongest | 300    | 0.047129 seconds | 6365.5188113703 |
| fast-route(mark):instance        | benchLongest | 300    | 0.047792 seconds | 6277.2067406986 |
| hack-routing:instance            | benchLongest | 300    | 0.050226 seconds | 5973.0052263568 |
| fast-route(group_count):instance | benchLongest | 300    | 0.050307 seconds | 5963.3806154415 |
| symfony:instance                 | benchLongest | 300    | 0.054886 seconds | 5465.8882402002 |
+----------------------------------+--------------+--------+------------------+-----------------+
```

## Raw ( No Caching ) - PHP 8.0 ( Opcache + JIT Compiler ):

> Represents development environment

```sh
+-------------------------+ Benchmark results for group raw. --------+-----------------+
| Case                    | Scenario     | Routes | Time             | Per Second      |
+-------------------------+--------------+--------+------------------+-----------------+
| fast-route(group_pos)   | benchAll     | 364    | 0.334316 seconds | 1088.7901967091 |
| fast-route(mark)        | benchLast    | 300    | 0.277145 seconds | 1082.4652818103 |
| fast-route(group_pos)   | benchLast    | 300    | 0.282833 seconds | 1060.6962221653 |
| fast-route(group_count) | benchAll     | 364    | 0.361025 seconds | 1008.24082713   |
| fast-route(mark)        | benchAll     | 364    | 0.371448 seconds | 979.94863559283 |
| fast-route(char_count)  | benchAll     | 364    | 0.371547 seconds | 979.68767329684 |
| fast-route(group_count) | benchLast    | 300    | 0.309712 seconds | 968.64204411612 |
| fast-route(char_count)  | benchLast    | 300    | 0.309792 seconds | 968.3915644755  |
| fast-route(mark)        | benchLongest | 300    | 0.339671 seconds | 883.20722349658 |
| symfony                 | benchAll     | 364    | 0.415018 seconds | 877.07021954235 |
| fast-route(group_pos)   | benchLongest | 300    | 0.344972 seconds | 869.63545964596 |
| fast-route(char_count)  | benchLongest | 300    | 0.351245 seconds | 854.10486360563 |
| fast-route(group_count) | benchLongest | 300    | 0.360763 seconds | 831.57124645359 |
| symfony                 | benchLongest | 300    | 0.424063 seconds | 707.44210915138 |
| symfony                 | benchLast    | 300    | 0.542752 seconds | 552.73860767584 |
| hack-routing            | benchAll     | 364    | 2.116192 seconds | 172.00706853675 |
| hack-routing            | benchLast    | 300    | 1.796167 seconds | 167.02231886686 |
| hack-routing            | benchLongest | 300    | 1.858841 seconds | 161.39089319576 |
+-------------------------+--------------+--------+------------------+-----------------+
```