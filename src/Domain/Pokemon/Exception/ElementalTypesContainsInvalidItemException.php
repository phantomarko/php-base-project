<?php

declare(strict_types=1);

namespace App\Domain\Pokemon\Exception;

use App\Domain\Common\Exception\DomainException;

final class ElementalTypesContainsInvalidItemException extends DomainException
{
    private const MESSAGE = 'elemental types contains an invalid item';

    public static function make(): self
    {
        return new self(self::MESSAGE);
    }
}
