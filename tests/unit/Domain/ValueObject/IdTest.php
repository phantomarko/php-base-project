<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\ValueObject;

use App\Domain\Exception\IdIsNotValidException;
use App\Domain\ValueObject\Id;
use App\Tests\Fixtures\Domain\ValueObject\ValueObjectMother;
use App\Tests\Unit\TestCase;

class IdTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(int $value): void
    {
        $uuid = ValueObjectMother::makeId($value);

        $this->assertEquals($value, $uuid->getValue());
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            'equals to min value' => [Id::MIN_VALUE],
            'min value plus one' => [Id::MIN_VALUE + 1],
            'max value minus one' => [Id::MAX_VALUE - 1],
            'equals to max value' => [Id::MAX_VALUE],
        ];
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(int $value): void
    {
        $this->expectException(IdIsNotValidException::class);
        ValueObjectMother::makeId($value);
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'shorter than min length' => [Id::MIN_VALUE - 1],
            'larger than max length' => [Id::MAX_VALUE + 1],
        ];
    }
}
