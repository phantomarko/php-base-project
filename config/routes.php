<?php

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

$route_builders = [
    new \App\Ui\Api\Pokemon\Route\RouteBuilder(),
];

return function (RoutingConfigurator $routes) use ($route_builders): void {
    foreach ($route_builders as $builder) {
        $routes = $builder->build($routes);
    }
};
