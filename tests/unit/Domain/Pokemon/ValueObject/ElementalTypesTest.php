<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Pokemon\ValueObject;

use App\Domain\Pokemon\Exception\ElementalTypesContainsInvalidItemException;
use App\Domain\Pokemon\Exception\ElementalTypeIsNotValidException;
use App\Domain\Pokemon\Exception\NumberOfElementalTypesIsGreaterThanExpectedException;
use App\Domain\Pokemon\ValueObject\ElementalType;
use App\Domain\Pokemon\ValueObject\ElementalTypes;
use PHPUnit\Framework\TestCase;

class ElementalTypesTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(?array $array): void
    {
        $types = ElementalTypes::tryFrom($array);

        $this->assertCount(count($array ?? []), $types ?? []);
        $this->assertEquals($array ?? [], $types?->toArray() ?? []);
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            'null' => [
                null
            ],
            'empty' => [
                []
            ],
            'one type' => [
                [
                    ElementalType::FIRE,
                ]
            ],
            'two types' => [
                [
                    ElementalType::STEEL,
                    ElementalType::FIGHTING,
                ]
            ],
        ];
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(string $expected_exception, array $array): void
    {
        $this->expectException($expected_exception);
        ElementalTypes::tryFrom($array);
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'not string item' => [
                ElementalTypesContainsInvalidItemException::class,
                [
                    ElementalType::FIRE,
                    1,
                ],
            ],
            'invalid string' => [
                ElementalTypeIsNotValidException::class,
                [
                    'FAIRY'
                ],
            ],
            'more types than limit' => [
                NumberOfElementalTypesIsGreaterThanExpectedException::class,
                [
                    ElementalType::STEEL,
                    ElementalType::FIGHTING,
                    ElementalType::FIRE,
                ]
            ],
        ];
    }
}
