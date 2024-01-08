<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Domain\Pokemon\ValueObject;

use App\Domain\Pokemon\ValueObject\PokemonName;
use App\Domain\Pokemon\ValueObject\PokemonNickname;
use App\Domain\Pokemon\ValueObject\PokemonType;
use App\Domain\Pokemon\ValueObject\PokemonTypeCollection;

final class ValueObjectMother
{
    public static function makePokemonName(?string $value = null): PokemonName
    {
        return new PokemonName($value ?? 'PIKACHU');
    }

    public static function makePokemonNickname(?string $value = null): PokemonNickname
    {
        return new PokemonNickname($value ?? 'SPARKY');
    }

    public static function makePokemonType(?string $value = null): PokemonType
    {
        return new PokemonType($value ?? PokemonType::ELECTRIC);
    }

    public static function makePokemonTypeCollection(?array $array = null): PokemonTypeCollection
    {
        return new PokemonTypeCollection($array ?? [self::makePokemonType()]);
    }
}
