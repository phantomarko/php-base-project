<?php

declare(strict_types=1);

namespace App\Domain\Common\ValueObject;

use App\Domain\Common\Exception\UuidIsNotValidException;

final class Uuid extends AbstractStringValueObject
{
    public const MIN_LENGTH = 18;
    public const MAX_LENGTH = 36;

    protected function validate(string $value): void
    {
        if (
            $this->isEmptyString($value)
            || !$this->isLengthBetweenValues($value, self::MIN_LENGTH, self::MAX_LENGTH)
            || !$this->isAlphanumericWithOptionalHyphens($value)
        ) {
            throw UuidIsNotValidException::make();
        }
    }
}
