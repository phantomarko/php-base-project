<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

use App\Domain\Exception\UuidIsNotValidException;
use App\Domain\Validation\StringValidationTrait;

final class Uuid extends AbstractStringValueObject
{
    use StringValidationTrait;

    public const MIN_LENGTH = 16;
    public const MAX_LENGTH = 32;

    protected function validate(string $value): void
    {
        if (
            $this->isEmptyString($value)
            || !$this->isLengthBetweenValues($value, self::MIN_LENGTH, self::MAX_LENGTH)
        ) {
            throw UuidIsNotValidException::make();
        }
    }
}
