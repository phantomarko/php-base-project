<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

use App\Domain\Exception\PokemonNameIsNotValidException;

class PokemonName extends AbstractStringValueObject
{
    public const MIN_LENGTH = 3;
    public const MAX_LENGTH = 20;

    protected function validate(string $value): void
    {
        if (
            $this->isEmptyString($value)
            || !$this->isLengthBetweenValues($value, static::MIN_LENGTH, static::MAX_LENGTH)
        ) {
            $this->throwInvalidException();
        }
    }

    protected function throwInvalidException(): void
    {
        throw PokemonNameIsNotValidException::make();
    }

    public function toNickname(): PokemonNickname
    {
        return new PokemonNickname($this->getValue());
    }
}
