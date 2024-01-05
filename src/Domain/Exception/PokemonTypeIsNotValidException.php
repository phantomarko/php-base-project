<?php

declare(strict_types=1);

namespace App\Domain\Exception;

final class PokemonTypeIsNotValidException extends DomainException
{
    private const MESSAGE = 'the Pokemon type is not valid';

    public static function make(): self
    {
        return new self(self::MESSAGE);
    }
}