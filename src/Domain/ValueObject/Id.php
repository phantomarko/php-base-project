<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

use App\Domain\Exception\IdIsNotValidException;

final class Id extends AbstractIntegerValueObject
{
    public const MIN_VALUE = 1;
    public const MAX_VALUE = 9999999;

    protected function validate(int $value): void
    {
        if (!$this->isIntegerBetweenValues($value, self::MIN_VALUE, self::MAX_VALUE)) {
            throw IdIsNotValidException::make();
        }
    }
}
