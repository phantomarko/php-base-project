<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

use App\Domain\Exception\PokemonTypeIsNotValidException;

final class PokemonType extends AbstractStringValueObject
{
    public const NORMAL = 'NORMAL';
    public const FIRE = 'FIRE';
    public const WATER = 'WATER';
    public const ELECTRIC = 'ELECTRIC';
    public const GRASS = 'GRASS';
    public const ICE = 'ICE';
    public const FIGHTING = 'FIGHTING';
    public const POISON = 'POISON';
    public const GROUND = 'GROUND';
    public const FLYING = 'FLYING';
    public const PSYCHIC = 'PSYCHIC';
    public const BUG = 'BUG';
    public const ROCK = 'ROCK';
    public const GHOST = 'GHOST';
    public const DRAGON = 'DRAGON';
    public const DARK = 'DARK';
    public const STEEL = 'STEEL';
    public const CASES = [
        self::NORMAL,
        self::FIRE,
        self::WATER,
        self::ELECTRIC,
        self::GRASS,
        self::ICE,
        self::FIGHTING,
        self::POISON,
        self::GROUND,
        self::FLYING,
        self::PSYCHIC,
        self::BUG,
        self::ROCK,
        self::GHOST,
        self::DRAGON,
        self::DARK,
        self::STEEL
    ];

    protected function validate(string $value): void
    {
        if (!in_array($value, self::CASES)) {
            throw PokemonTypeIsNotValidException::make();
        }
    }
}
