<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

use App\Domain\Exception\PokemonNameIsNotValidException;

final class PokemonName extends AbstractStringValueObject
{
    public const MIN_LENGTH = 3;
    public const MAX_LENGTH = 20;

    protected function validate(string $value): void
    {
        if (
            $this->isEmptyString($value)
            || !$this->isLengthBetweenValues($value, self::MIN_LENGTH, self::MAX_LENGTH)
        ) {
            throw PokemonNameIsNotValidException::make();
        }
    }
}
