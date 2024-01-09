<?php

declare(strict_types=1);

namespace App\Ui\Api\Common\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractController
{
    protected function makeResourceCreatedResponse(): Response
    {
        return new JsonResponse(data: ['message' => 'Resource created'], status: Response::HTTP_CREATED);
    }
}
