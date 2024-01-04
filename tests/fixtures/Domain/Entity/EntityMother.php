<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Domain\Entity;

use App\Domain\Entity\Pokemon;
use App\Domain\Entity\PokemonSpecie;
use App\Domain\ValueObject\Id;
use App\Domain\ValueObject\Uuid;
use App\Tests\Fixtures\Domain\ValueObject\ValueObjectMother;

final class EntityMother
{
    public static function makePokemonSpecie(?Id $id = null): PokemonSpecie
    {
        return new PokemonSpecie(
            id: is_null($id) ? ValueObjectMother::makeId() : $id
        );
    }

    public static function makePokemon(?Uuid $uuid = null): Pokemon
    {
        return new Pokemon(
            uuid: is_null($uuid) ? ValueObjectMother::makeUuid() : $uuid
        );
    }
}
