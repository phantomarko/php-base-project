<?php

declare(strict_types=1);

namespace App\Infrastructure\Pokemon\Bus\Tactician\Mapping;

use App\Application\Pokemon\Command\CreateSpecie\CreateSpecieCommand;
use App\Application\Pokemon\Command\CreateSpecie\CreateSpecieHandler;
use App\Infrastructure\Common\Bus\Tactician\Mapping\CommandToHandlerMapInterface;

final class CommandToHandlerMap implements CommandToHandlerMapInterface
{
    /**
     * @inheritDoc
     */
    public function get(): array
    {
        return [
            CreateSpecieCommand::class => CreateSpecieHandler::class,
        ];
    }
}
