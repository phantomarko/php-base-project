<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Domain\Entity;

use App\Domain\Entity\Pokemon;
use App\Domain\Entity\PokemonSpecie;
use App\Domain\ValueObject\Id;
use App\Domain\ValueObject\PokemonName;
use App\Domain\ValueObject\PokemonNickname;
use App\Domain\ValueObject\PokemonTypeCollection;
use App\Domain\ValueObject\Uuid;
use App\Tests\Fixtures\Domain\ValueObject\ValueObjectMother;

final class EntityMother
{
    public static function makePokemonSpecie(
        ?Id $id = null,
        ?PokemonName $name = null,
        ?PokemonTypeCollection $types = null
    ): PokemonSpecie {
        return new PokemonSpecie(
            id: $id,
            name: $name,
            types: $types
        );
    }

    public static function makeDefaultPokemonSpecie(
        ?Id $id = null,
        ?PokemonName $name = null,
        ?PokemonTypeCollection $types = null
    ): PokemonSpecie {
        return new PokemonSpecie(
            id: $id ?? ValueObjectMother::makeId(),
            name: $name ?? ValueObjectMother::makePokemonName(),
            types: $types ?? ValueObjectMother::makePokemonTypeCollection()
        );
    }

    public static function makePokemon(
        ?Uuid $uuid = null,
        ?PokemonSpecie $specie = null,
        ?PokemonNickname $nickname = null
    ): Pokemon {
        return new Pokemon(
            uuid: $uuid,
            specie: $specie,
            nickname: $nickname
        );
    }
}
