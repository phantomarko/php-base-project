<?php

declare(strict_types=1);

namespace App\Ui\Api\Pokemon\Converter;

use App\Application\Pokemon\Command\CreateSpecie\CreateSpecieCommand;
use App\Domain\Pokemon\Entity\Specie;
use Symfony\Component\HttpFoundation\Request;

final class RequestToCreateSpecieCommandConverter
{
    public function execute(Request $request): CreateSpecieCommand
    {
        $array = $request->toArray();
        return new CreateSpecieCommand(
            $array[Specie::ID] ?? null,
            $array[Specie::NAME] ?? null,
            $array[Specie::TYPES] ?? null
        );
    }
}
