<?php

namespace App\Ui\Api\Pokemon\Controller;

use App\Application\Pokemon\Command\CreateSpecie\CreateSpecieCommand;
use App\Application\Pokemon\Command\CreateSpecie\CreateSpecieHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class CreateSpecieController
{
    public function __construct(private readonly CreateSpecieHandler $handler)
    {
    }

    public function __invoke()
    {
        $this->handler->handle(new CreateSpecieCommand(
            1,
            'BULBASAUR',
            ['GRASS', 'POISON']
        ));
        return new JsonResponse(data: 'create specie', status: Response::HTTP_CREATED);
    }
}
