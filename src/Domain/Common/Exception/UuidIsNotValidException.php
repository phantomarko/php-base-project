<?php

declare(strict_types=1);

namespace App\Domain\Common\Exception;

final class UuidIsNotValidException extends DomainException
{
    private const MESSAGE = 'the UUID is not valid';

    public static function make(): self
    {
        return new self(self::MESSAGE);
    }
}
