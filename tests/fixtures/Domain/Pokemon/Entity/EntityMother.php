<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Domain\Pokemon\Entity;

use App\Domain\Common\ValueObject\Id;
use App\Domain\Common\ValueObject\Uuid;
use App\Domain\Pokemon\Entity\Pokemon;
use App\Domain\Pokemon\Entity\Specie;
use App\Domain\Pokemon\ValueObject\SpecieName;
use App\Domain\Pokemon\ValueObject\PokemonNickname;
use App\Domain\Pokemon\ValueObject\ElementalTypeCollection;
use App\Tests\Fixtures\Domain\Common\ValueObject\ValueObjectMother as CommonValueObjectMother;
use App\Tests\Fixtures\Domain\Pokemon\ValueObject\ValueObjectMother as PokemonValueObjectMother;

final class EntityMother
{
    public static function makeSpecie(
        ?Id $id = null,
        ?SpecieName $name = null,
        ?ElementalTypeCollection $types = null
    ): Specie {
        return new Specie(
            id: $id,
            name: $name,
            types: $types
        );
    }

    public static function makeDefaultSpecie(
        ?Id $id = null,
        ?SpecieName $name = null,
        ?ElementalTypeCollection $types = null
    ): Specie {
        return new Specie(
            id: $id ?? CommonValueObjectMother::makeId(),
            name: $name ?? PokemonValueObjectMother::makeSpecieName(),
            types: $types ?? PokemonValueObjectMother::makeElementalTypeCollection()
        );
    }

    public static function makePokemon(
        ?Uuid $uuid = null,
        ?Specie $specie = null,
        ?PokemonNickname $nickname = null
    ): Pokemon {
        return new Pokemon(
            uuid: $uuid,
            specie: $specie,
            nickname: $nickname
        );
    }
}
