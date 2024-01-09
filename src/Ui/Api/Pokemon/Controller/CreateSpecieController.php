<?php

namespace App\Ui\Api\Pokemon\Controller;

use App\Application\Pokemon\Command\CreateSpecie\CreateSpecieCommand;
use App\Application\Pokemon\Command\CreateSpecie\CreateSpecieHandler;
use App\Ui\Api\Common\Controller\AbstractController;
use App\Ui\Api\Common\Response\ResourceCreatedResponse;
use App\Ui\Api\Pokemon\Converter\RequestToCreateSpecieCommandConverter;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class CreateSpecieController extends AbstractController
{
    public function __construct(
        private readonly RequestToCreateSpecieCommandConverter $request_converter,
        private readonly CreateSpecieHandler $handler
    ) {
    }

    #[Route('/api/species', name: 'api.specie.create', methods: ['POST'])]
    #[OA\Tag(name: 'species')]
    #[OA\RequestBody(
        content: new OA\JsonContent(ref: new Model(type: CreateSpecieCommand::class))
    )]
    #[OA\Response(
        response: 201,
        description: 'Creates a specie',
        content: new OA\JsonContent(ref: new Model(type: ResourceCreatedResponse::class))
    )]
    public function __invoke(Request $request): Response
    {
        $this->handler->handle($this->request_converter->execute($request));

        return $this->makeResourceCreatedResponse();
    }
}
