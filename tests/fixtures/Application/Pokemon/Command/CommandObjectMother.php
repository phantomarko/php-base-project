<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Application\Pokemon\Command;

use App\Application\Pokemon\Command\CreateSpecie\CreateSpecieCommand;
use App\Application\Pokemon\Command\CreateSpecie\CreateSpecieHandler;
use App\Domain\Pokemon\Repository\SpecieRepositoryInterface;

final class CommandObjectMother
{
    public static function makeCreateSpecieCommand(
        ?int $id = null,
        ?string $name = null,
        ?array $types = null
    ): CreateSpecieCommand {
        return new CreateSpecieCommand(
            id: $id,
            name: $name,
            types: $types
        );
    }

    public static function makeCreateSpecieHandler(SpecieRepositoryInterface $repository): CreateSpecieHandler
    {
        return new CreateSpecieHandler($repository);
    }
}
