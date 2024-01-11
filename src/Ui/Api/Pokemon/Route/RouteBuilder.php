<?php

declare(strict_types=1);

namespace App\Ui\Api\Pokemon\Route;

use App\Infrastructure\Common\Route\Symfony\RouteBuilderInterface;
use App\Ui\Api\Pokemon\Controller\CreateSpecieController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

final class RouteBuilder implements RouteBuilderInterface
{
    public function build(RoutingConfigurator $routes): RoutingConfigurator
    {
        $routes->add('api.specie.create', '/api/species')
            ->controller(CreateSpecieController::class)
            ->methods(['POST']);

        return $routes;
    }
}
