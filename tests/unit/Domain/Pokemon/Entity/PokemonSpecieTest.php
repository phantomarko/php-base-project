<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Pokemon\Entity;

use App\Domain\Common\Exception\RequiredFieldIsMissingException;
use App\Domain\Common\ValueObject\Id;
use App\Domain\Pokemon\Entity\PokemonSpecie;
use App\Domain\Pokemon\ValueObject\PokemonName;
use App\Domain\Pokemon\ValueObject\PokemonTypeCollection;
use App\Tests\Fixtures\Domain\Common\ValueObject\ValueObjectMother as CommonValueObjectMother;
use App\Tests\Fixtures\Domain\Pokemon\Entity\EntityMother;
use App\Tests\Fixtures\Domain\Pokemon\ValueObject\ValueObjectMother as PokemonValueObjectMother;
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
                CommonValueObjectMother::makeId(),
                PokemonValueObjectMother::makePokemonName(),
                PokemonValueObjectMother::makePokemonTypeCollection(),
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
                PokemonValueObjectMother::makePokemonName(),
                PokemonValueObjectMother::makePokemonTypeCollection(),
            ],
            'name as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(PokemonSpecie::NAME)->getMessage(),
                CommonValueObjectMother::makeId(),
                null,
                PokemonValueObjectMother::makePokemonTypeCollection(),
            ],
            'types as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(PokemonSpecie::TYPES)->getMessage(),
                CommonValueObjectMother::makeId(),
                PokemonValueObjectMother::makePokemonName(),
                null,
            ],
        ];
    }
}
