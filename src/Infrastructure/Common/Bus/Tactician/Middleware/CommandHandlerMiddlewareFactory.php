<?php

declare(strict_types=1);

namespace App\Infrastructure\Common\Bus\Tactician\Middleware;

use App\Infrastructure\Common\Bus\Tactician\Mapping\CommandToHandlerMapInterface;
use League\Tactician\Container\ContainerLocator;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use Psr\Container\ContainerInterface;

final class CommandHandlerMiddlewareFactory
{
    /**
     * @param CommandToHandlerMapInterface[] $command_to_handler_maps
     */
    public function __construct(
        private readonly ContainerInterface $container,
        private readonly array $command_to_handler_maps
    ) {
    }

    public function make(): CommandHandlerMiddleware
    {
        $containerLocator = new ContainerLocator(
            $this->container,
            $this->getMappings()
        );

        return new CommandHandlerMiddleware(
            new ClassNameExtractor(),
            $containerLocator,
            new HandleInflector()
        );
    }

    private function getMappings(): array
    {
        $mappings = [];
        foreach ($this->command_to_handler_maps as $map) {
            $mappings = array_merge($mappings, $map->get());
        }
        return $mappings;
    }
}
