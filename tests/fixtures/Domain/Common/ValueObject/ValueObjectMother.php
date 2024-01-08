<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Domain\Common\ValueObject;

use App\Domain\Common\ValueObject\AbstractCollection;
use App\Domain\Common\ValueObject\Id;
use App\Domain\Common\ValueObject\Uuid;
use App\Tests\Fixtures\StringHelper;

final class ValueObjectMother
{
    use StringHelper;

    public static function makeUuid(?string $value = null): Uuid
    {
        return new Uuid($value ?? self::generateUuidRfc4122());
    }

    public static function makeId(?int $value = null): Id
    {
        return new Id($value ?? rand(Id::MIN_VALUE, Id::MAX_VALUE));
    }

    public static function makeCollection(?array $array = null): AbstractCollection
    {
        return new MockCollection($array ?? []);
    }
}
