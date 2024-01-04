<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

use App\Domain\Exception\UuidIsNotValidException;
use App\Domain\Validation\StringValidationTrait;

final class Uuid extends AbstractStringValueObject
{
    use StringValidationTrait;

    protected function validate(string $value): void
    {
        if ($this->isEmptyString($value)) {
            throw UuidIsNotValidException::make();
        }
    }
}
