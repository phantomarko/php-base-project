<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Domain\Pokemon\Entity;

use App\Domain\Common\ValueObject\Id;
use App\Domain\Common\ValueObject\Uuid;
use App\Domain\Pokemon\Entity\Pokemon;
use App\Domain\Pokemon\Entity\PokemonSpecie;
use App\Domain\Pokemon\ValueObject\PokemonName;
use App\Domain\Pokemon\ValueObject\PokemonNickname;
use App\Domain\Pokemon\ValueObject\PokemonTypeCollection;
use App\Tests\Fixtures\Domain\Common\ValueObject\ValueObjectMother as CommonValueObjectMother;
use App\Tests\Fixtures\Domain\Pokemon\ValueObject\ValueObjectMother as PokemonValueObjectMother;

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
            id: $id ?? CommonValueObjectMother::makeId(),
            name: $name ?? PokemonValueObjectMother::makePokemonName(),
            types: $types ?? PokemonValueObjectMother::makePokemonTypeCollection()
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
