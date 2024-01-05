<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Domain\ValueObject;

use App\Domain\ValueObject\AbstractCollection;
use App\Domain\ValueObject\Id;
use App\Domain\ValueObject\PokemonName;
use App\Domain\ValueObject\PokemonType;
use App\Domain\ValueObject\PokemonTypeCollection;
use App\Domain\ValueObject\Uuid;
use App\Tests\Fixtures\StringHelper;

final class ValueObjectMother
{
    use StringHelper;

    public static function makeUuid(?string $value = null): Uuid
    {
        return new Uuid($value ?? self::generateUuidRfc4122());
    }

    public static function makeId(?int $value = null): Id
    {
        return new Id($value ?? rand(Id::MIN_VALUE, Id::MAX_VALUE));
    }

    public static function makePokemonName(?string $value = null): PokemonName
    {
        return new PokemonName($value ?? 'PIKACHU');
    }

    public static function makePokemonType(?string $value = null): PokemonType
    {
        return new PokemonType($value ?? PokemonType::ELECTRIC);
    }

    public static function makePokemonTypeCollection(?array $array = null): PokemonTypeCollection
    {
        return new PokemonTypeCollection($array ?? []);
    }

    public static function makeCollection(?array $array = null): AbstractCollection
    {
        return new MockCollection($array ?? []);
    }
}
