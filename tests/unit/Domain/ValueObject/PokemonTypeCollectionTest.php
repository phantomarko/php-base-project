<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\ValueObject;

use App\Domain\ValueObject\PokemonType;
use App\Tests\Fixtures\Domain\ValueObject\ValueObjectMother;
use PHPUnit\Framework\TestCase;

class PokemonTypeCollectionTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(array $array): void
    {
        $types = ValueObjectMother::makePokemonTypeCollection($array);

        $this->assertCount(count($array), $types);
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            'empty' => [
                []
            ],
            'single type' => [
                [
                    ValueObjectMother::makePokemonType(PokemonType::FIRE)
                ]
            ],
            'multiple types' => [
                [
                    ValueObjectMother::makePokemonType(PokemonType::STEEL),
                    ValueObjectMother::makePokemonType(PokemonType::FIGHTING),
                ]
            ],
        ];
    }
}
