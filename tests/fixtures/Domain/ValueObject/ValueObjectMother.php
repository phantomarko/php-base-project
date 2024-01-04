<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Domain\ValueObject;

use App\Domain\ValueObject\Uuid;

class ValueObjectMother
{
    public static function makeUuid(?string $value): Uuid
    {
        return new Uuid(is_null($value) ? 'uuid-uuid-uuid-uuid' : $value);
    }
}
