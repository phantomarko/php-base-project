<?php

declare(strict_types=1);

namespace App\Domain\Exception;

final class IdIsNotValidException extends DomainException
{
    private const MESSAGE = 'the ID is not valid';

    public static function make(): self
    {
        return new self(self::MESSAGE);
    }
}
