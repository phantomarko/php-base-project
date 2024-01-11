<?php

declare(strict_types=1);

namespace App\Infrastructure\Common\Bus\Tactician\Middleware;

use League\Tactician\Container\ContainerLocator;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use Psr\Container\ContainerInterface;

final class CommandHandlerMiddlewareFactory
{
    /**
     * @param array<string, string> $mappings array of mappings with the command as key holding the handler as value
     */
    public function __construct(
        private readonly ContainerInterface $container,
        private readonly array $mappings
    ) {
    }

    public function make(): CommandHandlerMiddleware
    {
        $containerLocator = new ContainerLocator(
            $this->container,
            $this->mappings
        );

        return new CommandHandlerMiddleware(
            new ClassNameExtractor(),
            $containerLocator,
            new HandleInflector()
        );
    }
}
