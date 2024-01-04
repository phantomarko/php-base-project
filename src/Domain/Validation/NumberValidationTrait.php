<?php

declare(strict_types=1);

namespace App\Domain\Validation;

trait NumberValidationTrait
{
    protected function isIntegerBetweenValues(int $integer, int $min, int $max): bool
    {
        return $min <= $integer && $integer <= $max;
    }
}
