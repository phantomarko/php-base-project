<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\ValueObject;

use App\Domain\Exception\UuidIsNotValidException;
use App\Tests\Fixtures\Domain\ValueObject\ValueObjectMother;
use PHPUnit\Framework\TestCase;

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
            ['uuid-uuid-uuid-uuid'],
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
        ];
    }
}
