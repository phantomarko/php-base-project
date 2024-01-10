<?php

declare(strict_types=1);

namespace App\Domain\Pokemon\Exception;

use App\Domain\Common\Exception\DomainException;

final class NumberOfElementalTypesIsGreaterThanExpectedException extends DomainException
{
    private const MESSAGE = 'number of elemental types can not greater than %s';

    public static function makeByItemsLimit(int $limit): self
    {
        return new self(sprintf(self::MESSAGE, $limit));
    }
}
