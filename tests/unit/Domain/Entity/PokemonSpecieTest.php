<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Entity;

use App\Domain\Entity\PokemonSpecie;
use App\Domain\Exception\RequiredFieldIsMissingException;
use App\Domain\ValueObject\Id;
use App\Domain\ValueObject\PokemonName;
use App\Domain\ValueObject\PokemonTypeCollection;
use App\Tests\Fixtures\Domain\Entity\EntityMother;
use App\Tests\Fixtures\Domain\ValueObject\ValueObjectMother;
use App\Tests\Unit\TestCase;

class PokemonSpecieTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(
        Id $id,
        PokemonName $name,
        PokemonTypeCollection $types
    ): void {
        $pokemon_specie = EntityMother::makePokemonSpecie(
            id: $id,
            name: $name,
            types: $types
        );

        $this->assertEquals($id, $pokemon_specie->getId());
        $this->assertEquals($name, $pokemon_specie->getName());
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            [
                ValueObjectMother::makeId(),
                ValueObjectMother::makePokemonName(),
                ValueObjectMother::makePokemonTypeCollection(),
            ],
        ];
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(
        string $expected_exception,
        string $expected_message,
        ?Id $id,
        ?PokemonName $name,
        ?PokemonTypeCollection $types
    ): void {
        $this->expectException($expected_exception);
        $this->expectExceptionMessage($expected_message);
        EntityMother::makePokemonSpecie(
            id: $id,
            name: $name,
            types: $types
        );
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'id as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(PokemonSpecie::ID)->getMessage(),
                null,
                ValueObjectMother::makePokemonName(),
                ValueObjectMother::makePokemonTypeCollection(),
            ],
            'name as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(PokemonSpecie::NAME)->getMessage(),
                ValueObjectMother::makeId(),
                null,
                ValueObjectMother::makePokemonTypeCollection(),
            ],
            'types as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(PokemonSpecie::TYPES)->getMessage(),
                ValueObjectMother::makeId(),
                ValueObjectMother::makePokemonName(),
                null,
            ],
        ];
    }
}
