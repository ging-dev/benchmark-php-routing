<?php

/* Generates the routes for the benchmark */

$txt = __DIR__ . '/../routes/bitbucket-routes.txt';
$symfony_routes = __DIR__ . '/../routes/symfony-routes.php';
$fastroute_routes = __DIR__ . '/../routes/fastroute-routes.php';
$hack_routes = __DIR__ . '/../routes/hack-routes.php';
$result_routes = __DIR__ . '/../routes/result-routes.php';

$vars = ['john', 'paul', 'george', 'ringo'];

$routes = [];
$symfony = [];
$hack = [];

$fp = fopen($txt, 'r');
while ($r = fgets($fp)) {
    $r = rtrim($r);

    $name = preg_replace('#\W+#', '_', $r);
    $name = trim($name, '_');

    // $routes->add('workspaces', new Route('/workspaces'));
    $symfony[] = "\$routes->add('{$name}', new Symfony\Component\Routing\Route('{$r}'));";

    // $routes->addRoute('GET', '/addon', ['_route' => 'addon']);
    $fast[] = "\$routes->addRoute('GET', '{$r}', ['_route' => '{$name}']);";

    // '/addon' => 'addon'
    $hack[] = "            '{$r}' => ['_route' => '{$name}'],";

    $m = $r;
    $result = "['_route' => '{$name}'";

    preg_match_all('#\{(\w+)\}#', $r, $R);
    if (!empty($R[1])) {
        foreach ($R[1] as $i => $var) {
            $value = current($vars);
            if (!next($vars)) {
                reset($vars);
            }

            $result .= ", '{$var}' => '{$value}'";
            $m = str_replace($R[0][$i], $value, $m);
        }
    }

    /*
    * ['route' => '/workspaces', 'result' => ['_route' => 'workspaces']]
    */
    $routes[] = "['route' => '{$m}', 'result' => {$result}]]";
}

fclose($fp);

file_put_contents($symfony_routes, "<?php \n\n\$routes = new Symfony\Component\Routing\RouteCollection(); \n\n" . implode("\n", $symfony) . "\n\nreturn \$routes;");
printf("%s done.\n", basename($symfony_routes));

file_put_contents($fastroute_routes, "<?php\n\n" . implode("\n", $fast));

printf("%s done.\n", basename($fastroute_routes));

$hack = implode("\n", $hack);
file_put_contents(
    $hack_routes,
    <<<PHP
<?php

use HackRouting\AbstractMatcher;
use HackRouting\HttpMethod;

\$cache = \$cache ?? null;

return new class(\$cache) extends AbstractMatcher {
   protected function getRoutes(): array { 
       return [
           HttpMethod::GET => [
$hack
           ]
       ];
   }
};
PHP
);

printf("%s done.\n", basename($hack_routes));

file_put_contents($result_routes, '<?php return array(' . implode(",\n\t", $routes) . ');');

printf("%s done.\n", basename($result_routes));
