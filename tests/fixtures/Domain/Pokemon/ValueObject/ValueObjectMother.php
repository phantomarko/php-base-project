<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Domain\Pokemon\ValueObject;

use App\Domain\Pokemon\ValueObject\SpecieName;
use App\Domain\Pokemon\ValueObject\PokemonNickname;
use App\Domain\Pokemon\ValueObject\ElementalType;
use App\Domain\Pokemon\ValueObject\ElementalTypes;

final class ValueObjectMother
{
    public static function makeSpecieName(?string $value = null): SpecieName
    {
        return new SpecieName($value ?? 'PIKACHU');
    }

    public static function makePokemonNickname(?string $value = null): PokemonNickname
    {
        return new PokemonNickname($value ?? 'SPARKY');
    }

    public static function makeElementalType(?string $value = null): ElementalType
    {
        return new ElementalType($value ?? ElementalType::ELECTRIC);
    }

    public static function makeElementalTypes(?array $array = null): ElementalTypes
    {
        return new ElementalTypes($array ?? [self::makeElementalType()]);
    }
}
