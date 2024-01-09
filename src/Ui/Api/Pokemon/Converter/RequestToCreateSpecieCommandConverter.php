<?php

declare(strict_types=1);

namespace App\Ui\Api\Pokemon\Converter;

use App\Application\Pokemon\Command\CreateSpecie\CreateSpecieCommand;
use Symfony\Component\HttpFoundation\Request;

final class RequestToCreateSpecieCommandConverter
{
    public function execute(Request $request): CreateSpecieCommand
    {
        $array = $request->toArray();
        return new CreateSpecieCommand(
            $array['id'] ?? null,
            $array['name'] ?? null,
            $array['types'] ?? null
        );
    }
}
