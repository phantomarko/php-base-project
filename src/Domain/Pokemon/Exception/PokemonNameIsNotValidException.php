<?php

declare(strict_types=1);

namespace App\Domain\Pokemon\Exception;

use App\Domain\Common\Exception\DomainException;

final class PokemonNameIsNotValidException extends DomainException
{
    private const MESSAGE = 'the Pokemon name is not valid';

    public static function make(): self
    {
        return new self(self::MESSAGE);
    }
}
