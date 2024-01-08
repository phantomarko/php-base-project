<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Pokemon\ValueObject;

use App\Domain\Pokemon\Exception\ElementalTypeIsNotValidException;
use App\Domain\Pokemon\ValueObject\ElementalType;
use App\Tests\Fixtures\Domain\Pokemon\ValueObject\ValueObjectMother;
use App\Tests\Unit\TestCase;

class ElementalTypeTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(string $value): void
    {
        $type = ValueObjectMother::makeElementalType($value);

        $this->assertEquals($value, $type->getValue());
    }

    public static function createSuccessfullyProvider(): array
    {
        return array_map(fn(string $case): array => [$case], ElementalType::CASES);
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(string $value): void
    {
        $this->expectException(ElementalTypeIsNotValidException::class);
        ValueObjectMother::makeElementalType($value);
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'empty string' => [''],
            'blank space' => [' '],
            'case not allowed' => ['FAIRY'],
        ];
    }
}
