<?php

declare(strict_types=1);

namespace App\Domain\Pokemon\Exception;

use App\Domain\Common\Exception\DomainException;

final class PokemonTypeCollectionHasInvalidItemException extends DomainException
{
    private const MESSAGE = 'the Pokemon types have an invalid item';

    public static function make(): self
    {
        return new self(self::MESSAGE);
    }
}
