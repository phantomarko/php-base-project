<?php

declare(strict_types=1);

namespace App\Domain\Validation;

trait StringValidationTrait
{
    public function isEmptyString(string $string): bool
    {
        return empty(trim($string));
    }

    public function isLengthBetweenValues(string $string, int $min, int $max): bool
    {
        $length = strlen($string);
        return $min <= $length && $length <= $max;
    }
}
