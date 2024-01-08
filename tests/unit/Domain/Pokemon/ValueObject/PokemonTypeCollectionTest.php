<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Pokemon\ValueObject;

use App\Domain\Pokemon\Exception\PokemonTypeCollectionHasInvalidItemException;
use App\Domain\Pokemon\Exception\PokemonTypeIsNotValidException;
use App\Domain\Pokemon\ValueObject\PokemonType;
use App\Domain\Pokemon\ValueObject\PokemonTypeCollection;
use PHPUnit\Framework\TestCase;

class PokemonTypeCollectionTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(?array $array): void
    {
        $types = PokemonTypeCollection::tryFrom($array);

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
                    PokemonType::FIRE,
                ]
            ],
            'multiple types' => [
                [
                    PokemonType::STEEL,
                    PokemonType::FIGHTING,
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
        PokemonTypeCollection::tryFrom($array);
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'not string item' => [
                PokemonTypeCollectionHasInvalidItemException::class,
                [
                    PokemonType::FIRE,
                    1,
                ],
            ],
            'invalid string' => [
                PokemonTypeIsNotValidException::class,
                [
                    'FAIRY'
                ],
            ],
        ];
    }
}
