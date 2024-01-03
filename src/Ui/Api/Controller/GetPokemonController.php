<?php

namespace App\Ui\Api\Controller;

use Symfony\Component\HttpFoundation\Response;

class GetPokemonController
{
    public function __invoke()
    {
        return new Response(content: 'ola k ase, buscando un pokemon o k ase');
    }
}
