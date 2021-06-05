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

## PHP 8.0 ( Opcache + JIT Compiler ):

```sh
+-------------------------------------------------+--------------+--------+------------------+-----------------+
| Case                                            | Scenario     | Routes | Time             | Per Second      |
+-------------------------------------------------+--------------+--------+------------------+-----------------+
| fast-route:dispatcher(char_count):cached(file)  | benchAll     | 364    | 0.007986 seconds | 45580.733124347 |
| fast-route:dispatcher(group_count):cached(file) | benchAll     | 364    | 0.008950 seconds | 40670.413596526 |
| fast-route:dispatcher(mark):cached(file)        | benchAll     | 364    | 0.009015 seconds | 40377.843907857 |
| fast-route:dispatcher(group_pos):cached(file)   | benchAll     | 364    | 0.009015 seconds | 40376.776049931 |
| fast-route:dispatcher(char_count):cached(file)  | benchLast    | 300    | 0.008489 seconds | 35340.294902401 |
| fast-route:dispatcher(group_count):cached(file) | benchLast    | 300    | 0.008904 seconds | 33692.797086703 |
| fast-route:dispatcher(group_pos):cached(file)   | benchLast    | 300    | 0.009038 seconds | 33193.289015511 |
| fast-route:dispatcher(mark):cached(file)        | benchLast    | 300    | 0.009958 seconds | 30126.444322072 |
| fast-route:dispatcher(char_count):cached(file)  | benchLongest | 300    | 0.057436 seconds | 5223.2059243516 |
| fast-route:dispatcher(mark):cached(file)        | benchLongest | 300    | 0.060576 seconds | 4952.4595196675 |
| fast-route:dispatcher(group_count):cached(file) | benchLongest | 300    | 0.062500 seconds | 4800            |
| hack-routing:cached(apcu)                       | benchLast    | 300    | 0.064002 seconds | 4687.3682681239 |
| hack-routing:cached(file)                       | benchLast    | 300    | 0.064103 seconds | 4679.9763451818 |
| hack-routing:cached(file)                       | benchAll     | 364    | 0.078031 seconds | 4664.8089316378 |
| fast-route:dispatcher(group_pos):cached(file)   | benchLongest | 300    | 0.064484 seconds | 4652.3082383738 |
| hack-routing:cached(apcu)                       | benchAll     | 364    | 0.081533 seconds | 4464.4524320562 |
| hack-routing:cached(apcu)                       | benchLongest | 300    | 0.120206 seconds | 2495.7132458384 |
| hack-routing:cached(file)                       | benchLongest | 300    | 0.129106 seconds | 2323.6712156746 |
| symfony:cached(file)                            | benchLast    | 300    | 0.282813 seconds | 1060.7722286995 |
| symfony:cached(file)                            | benchAll     | 364    | 0.351659 seconds | 1035.0934808622 |
| fast-route:dispatcher(group_pos)                | benchAll     | 364    | 0.362540 seconds | 1004.0271234504 |
| fast-route:dispatcher(mark)                     | benchAll     | 364    | 0.367742 seconds | 989.82422190555 |
| fast-route:dispatcher(group_pos)                | benchLast    | 300    | 0.307105 seconds | 976.86438546315 |
| fast-route:dispatcher(group_count)              | benchLast    | 300    | 0.311405 seconds | 963.37584323729 |
| fast-route:dispatcher(char_count)               | benchAll     | 364    | 0.395301 seconds | 920.8176153128  |
| fast-route:dispatcher(group_count)              | benchAll     | 364    | 0.397550 seconds | 915.60785536684 |
| fast-route:dispatcher(char_count)               | benchLast    | 300    | 0.330377 seconds | 908.05324665766 |
| fast-route:dispatcher(mark)                     | benchLast    | 300    | 0.335990 seconds | 892.88321051343 |
| symfony:cached(file)                            | benchLongest | 300    | 0.348710 seconds | 860.31357941632 |
| fast-route:dispatcher(mark)                     | benchLongest | 300    | 0.367863 seconds | 815.52112896965 |
| fast-route:dispatcher(char_count)               | benchLongest | 300    | 0.371169 seconds | 808.25747770258 |
| fast-route:dispatcher(group_pos)                | benchLongest | 300    | 0.373890 seconds | 802.37468347651 |
| symfony                                         | benchAll     | 364    | 0.465045 seconds | 782.71999343772 |
| fast-route:dispatcher(group_count)              | benchLongest | 300    | 0.391357 seconds | 766.56316194438 |
| symfony                                         | benchLongest | 300    | 0.406701 seconds | 737.64291455113 |
| symfony                                         | benchLast    | 300    | 0.574142 seconds | 522.51862131856 |
| hack-routing                                    | benchLast    | 300    | 2.307287 seconds | 130.02282416137 |
| hack-routing                                    | benchAll     | 364    | 2.820049 seconds | 129.0757692057  |
| hack-routing                                    | benchLongest | 300    | 2.434096 seconds | 123.24904905685 |
+-------------------------------------------------+--------------+--------+------------------+-----------------+
```