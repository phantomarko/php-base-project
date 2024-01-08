<?php

declare(strict_types=1);

namespace App\Domain\Common\ValueObject;

use App\Domain\Common\Validation\NumberValidationTrait;

abstract class AbstractIntegerValueObject
{
    use NumberValidationTrait;

    final public function __construct(private readonly int $value)
    {
        $this->validate($value);
    }

    abstract protected function validate(int $value): void;

    final public function getValue(): int
    {
        return $this->value;
    }

    final public function __toString(): string
    {
        return (string)$this->value;
    }

    final public static function tryFrom(?int $value): ?static
    {
        if (is_null($value)) {
            return null;
        }

        return new static($value);
    }
}
