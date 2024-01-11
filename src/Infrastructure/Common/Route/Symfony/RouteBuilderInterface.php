<?php

declare(strict_types=1);

namespace App\Infrastructure\Common\Route\Symfony;

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

interface RouteBuilderInterface
{
    public function build(RoutingConfigurator $routes): RoutingConfigurator;
}
