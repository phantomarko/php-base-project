<?php

namespace App\Ui\Api\Controller;

use Symfony\Component\HttpFoundation\Response;

class ListPokemonController
{
    public function __invoke()
    {
        return new Response(content: 'ola k ase, buscando to los pokemon o k ase');
    }
}