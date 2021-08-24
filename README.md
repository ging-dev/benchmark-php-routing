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
