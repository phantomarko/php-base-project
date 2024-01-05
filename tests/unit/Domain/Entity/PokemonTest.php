<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Entity;

use App\Domain\Entity\Pokemon;
use App\Domain\Entity\PokemonSpecie;
use App\Domain\Exception\RequiredFieldIsMissingException;
use App\Domain\ValueObject\PokemonNickname;
use App\Domain\ValueObject\Uuid;
use App\Tests\Fixtures\Domain\Entity\EntityMother;
use App\Tests\Fixtures\Domain\ValueObject\ValueObjectMother;
use App\Tests\Unit\TestCase;

class PokemonTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(
        Uuid $uuid,
        PokemonSpecie $specie,
        ?PokemonNickname $nickname
    ): void {
        $pokemon = EntityMother::makePokemon(
            uuid: $uuid,
            specie: $specie,
            nickname: $nickname
        );

        $this->assertEquals($uuid, $pokemon->getUuid());
        $this->assertEquals($specie, $pokemon->getSpecie());
        $this->assertEquals($nickname ?? $specie->getName()->toNickname(), $pokemon->getNickname());
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            [
                ValueObjectMother::makeUuid(),
                EntityMother::makeDefaultPokemonSpecie(),
                null
            ],
            [
                ValueObjectMother::makeUuid(),
                EntityMother::makeDefaultPokemonSpecie(),
                ValueObjectMother::makePokemonNickname()
            ],
        ];
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(
        string $expected_exception,
        string $expected_message,
        ?Uuid $uuid,
        ?PokemonSpecie $specie,
        ?PokemonNickname $nickname
    ): void {
        $this->expectException($expected_exception);
        $this->expectExceptionMessage($expected_message);
        EntityMother::MakePokemon(
            uuid: $uuid,
            specie: $specie,
            nickname: $nickname
        );
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'uuid as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(Pokemon::UUID)->getMessage(),
                null,
                EntityMother::makeDefaultPokemonSpecie(),
                null,
            ],
            'specie as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(Pokemon::SPECIE)->getMessage(),
                ValueObjectMother::makeUuid(),
                null,
                null,
            ],
        ];
    }
}
