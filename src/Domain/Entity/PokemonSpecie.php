<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\ValueObject\Id;

class PokemonSpecie
{
    public function __construct(private readonly Id $id)
    {
    }

    public function getId(): Id
    {
        return $this->id;
    }
}
