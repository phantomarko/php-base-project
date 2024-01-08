<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Pokemon\ValueObject;

use App\Domain\Pokemon\Exception\ElementalTypeCollectionHasInvalidItemException;
use App\Domain\Pokemon\Exception\ElementalTypeIsNotValidException;
use App\Domain\Pokemon\ValueObject\ElementalType;
use App\Domain\Pokemon\ValueObject\ElementalTypeCollection;
use PHPUnit\Framework\TestCase;

class ElementalTypeCollectionTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(?array $array): void
    {
        $types = ElementalTypeCollection::tryFrom($array);

        $this->assertCount(count($array ?? []), $types ?? []);
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
            'single type' => [
                [
                    ElementalType::FIRE,
                ]
            ],
            'multiple types' => [
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
        ElementalTypeCollection::tryFrom($array);
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'not string item' => [
                ElementalTypeCollectionHasInvalidItemException::class,
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
        ];
    }
}
