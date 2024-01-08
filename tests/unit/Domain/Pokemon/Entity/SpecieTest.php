<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Pokemon\Entity;

use App\Domain\Common\Exception\RequiredFieldIsMissingException;
use App\Domain\Common\ValueObject\Id;
use App\Domain\Pokemon\Entity\Specie;
use App\Domain\Pokemon\ValueObject\SpecieName;
use App\Domain\Pokemon\ValueObject\ElementalTypeCollection;
use App\Tests\Fixtures\Domain\Common\ValueObject\ValueObjectMother as CommonValueObjectMother;
use App\Tests\Fixtures\Domain\Pokemon\Entity\EntityMother;
use App\Tests\Fixtures\Domain\Pokemon\ValueObject\ValueObjectMother as PokemonValueObjectMother;
use App\Tests\Unit\TestCase;

class SpecieTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(
        Id $id,
        SpecieName $name,
        ElementalTypeCollection $types
    ): void {
        $pokemon_specie = EntityMother::makeSpecie(
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
                CommonValueObjectMother::makeId(),
                PokemonValueObjectMother::makeSpecieName(),
                PokemonValueObjectMother::makeElementalTypeCollection(),
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
        ?SpecieName $name,
        ?ElementalTypeCollection $types
    ): void {
        $this->expectException($expected_exception);
        $this->expectExceptionMessage($expected_message);
        EntityMother::makeSpecie(
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
                RequiredFieldIsMissingException::makeByFieldName(Specie::ID)->getMessage(),
                null,
                PokemonValueObjectMother::makeSpecieName(),
                PokemonValueObjectMother::makeElementalTypeCollection(),
            ],
            'name as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(Specie::NAME)->getMessage(),
                CommonValueObjectMother::makeId(),
                null,
                PokemonValueObjectMother::makeElementalTypeCollection(),
            ],
            'types as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(Specie::TYPES)->getMessage(),
                CommonValueObjectMother::makeId(),
                PokemonValueObjectMother::makeSpecieName(),
                null,
            ],
        ];
    }
}
