<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Domain\Entity;

use App\Domain\Entity\Pokemon;
use App\Domain\Entity\PokemonSpecie;
use App\Domain\ValueObject\Id;
use App\Domain\ValueObject\PokemonName;
use App\Domain\ValueObject\Uuid;
use App\Tests\Fixtures\Domain\ValueObject\ValueObjectMother;

final class EntityMother
{
    public static function makePokemonSpecie(
        ?Id $id = null,
        ?PokemonName $name = null
    ): PokemonSpecie {
        return new PokemonSpecie(
            id: $id,
            name: $name
        );
    }

    public static function makeDefaultPokemonSpecie(
        ?Id $id = null,
        ?PokemonName $name = null
    ): PokemonSpecie {
        return new PokemonSpecie(
            id: $id ?? ValueObjectMother::makeId(),
            name: $name ?? ValueObjectMother::makePokemonName()
        );
    }

    public static function makePokemon(?Uuid $uuid = null): Pokemon
    {
        return new Pokemon(
            uuid: $uuid
        );
    }

    public static function makeDefaultPokemon(?Uuid $uuid = null): Pokemon
    {
        return new Pokemon(
            uuid: $uuid ?? ValueObjectMother::makeUuid()
        );
    }
}
