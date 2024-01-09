<?php

namespace App\Ui\Api\Pokemon\Controller;

use App\Application\Pokemon\Command\CreateSpecie\CreateSpecieCommand;
use App\Application\Pokemon\Command\CreateSpecie\CreateSpecieHandler;
use App\Ui\Api\Common\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class CreateSpecieController extends AbstractController
{
    public function __construct(private readonly CreateSpecieHandler $handler)
    {
    }

    #[Route('/species', name: 'specie.create', methods: ['POST'])]
    public function __invoke(): Response
    {
        $this->handler->handle(new CreateSpecieCommand(
            1,
            'BULBASAUR',
            ['GRASS', 'POISON']
        ));

        return $this->makeResourceCreatedResponse();
    }
}
