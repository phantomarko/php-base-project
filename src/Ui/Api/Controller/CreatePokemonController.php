<?php

namespace App\Ui\Api\Controller;

use Symfony\Component\HttpFoundation\Response;

class CreatePokemonController
{
    public function __invoke()
    {
        return new Response(content: 'ola k ase, creando un pokemon o k ase');
    }
}