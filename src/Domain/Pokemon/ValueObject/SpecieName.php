<?php

declare(strict_types=1);

namespace App\Domain\Pokemon\ValueObject;

use App\Domain\Common\ValueObject\AbstractStringValueObject;
use App\Domain\Pokemon\Exception\SpecieNameIsNotValidException;

class SpecieName extends AbstractStringValueObject
{
    public const MIN_LENGTH = 3;
    public const MAX_LENGTH = 20;

    protected function validate(string $value): void
    {
        if (
            $this->isEmptyString($value)
            || !$this->isLengthBetweenValues($value, static::MIN_LENGTH, static::MAX_LENGTH)
        ) {
            throw SpecieNameIsNotValidException::make();
        }
    }
}
