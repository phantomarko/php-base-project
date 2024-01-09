<?php

namespace App\Ui\Api\Pokemon\Controller;

use App\Application\Pokemon\Command\CreateSpecie\CreateSpecieCommand;
use App\Application\Pokemon\Command\CreateSpecie\CreateSpecieHandler;
use App\Ui\Api\Common\Controller\AbstractController;

final class CreateSpecieController extends AbstractController
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

        return $this->makeResourceCreatedResponse();
    }
}
