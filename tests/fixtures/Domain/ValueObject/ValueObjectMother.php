<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Domain\ValueObject;

use App\Domain\ValueObject\Id;
use App\Domain\ValueObject\Uuid;
use App\Tests\Fixtures\StringHelper;

class ValueObjectMother
{
    use StringHelper;

    public static function makeUuid(?string $value): Uuid
    {
        return new Uuid(is_null($value) ? self::generateUuidRfc4122() : $value);
    }

    public static function makeId(?int $value): Id
    {
        return new Id(is_null($value) ? rand(Id::MIN_VALUE, Id::MAX_VALUE) : $value);
    }
}
