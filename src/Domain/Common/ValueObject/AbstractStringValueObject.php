<?php

declare(strict_types=1);

namespace App\Domain\Common\ValueObject;

use App\Domain\Common\Validation\StringValidationTrait;

abstract class AbstractStringValueObject
{
    use StringValidationTrait;

    final public function __construct(private readonly string $value)
    {
        $this->validate($value);
    }

    abstract protected function validate(string $value): void;

    final public function getValue(): string
    {
        return $this->value;
    }

    final public function __toString(): string
    {
        return $this->value;
    }

    final public static function tryFrom(?string $value): ?static
    {
        if (is_null($value)) {
            return null;
        }

        return new static($value);
    }
}
