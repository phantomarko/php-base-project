<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\ValueObject;

use App\Domain\Exception\UuidIsNotValidException;
use App\Domain\ValueObject\Uuid;
use App\Tests\Fixtures\Domain\ValueObject\ValueObjectMother;
use App\Tests\Unit\TestCase;

class UuidTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(string $value): void
    {
        $uuid = ValueObjectMother::makeUuid($value);

        $this->assertEquals($value, $uuid->getValue());
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            'UUID RFC 4122' => [self::generateUuidRfc4122()],
            'equals to min length' => [str_repeat('s', Uuid::MIN_LENGTH)],
            'min length plus one' => [str_repeat('s', Uuid::MIN_LENGTH + 1)],
            'max length minus one' => [str_repeat('s', Uuid::MAX_LENGTH - 1)],
            'equals to max length' => [str_repeat('s', Uuid::MAX_LENGTH)],
        ];
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(string $value): void
    {
        $this->expectException(UuidIsNotValidException::class);
        ValueObjectMother::makeUuid($value);
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'empty string' => [''],
            'blank spaces' => ['    '],
            'shorter than min length' => [str_repeat('s', Uuid::MIN_LENGTH - 1)],
            'larger than max length' => [str_repeat('s', Uuid::MAX_LENGTH + 1)],
            'only "-"' => [str_repeat('-', Uuid::MIN_LENGTH)],
            'only "_"' => [str_repeat('_', Uuid::MIN_LENGTH)],
        ];
    }
}
