<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Pokemon\Entity;

use App\Domain\Common\Exception\RequiredFieldIsMissingException;
use App\Domain\Common\ValueObject\Uuid;
use App\Domain\Pokemon\Entity\Pokemon;
use App\Domain\Pokemon\Entity\Specie;
use App\Domain\Pokemon\ValueObject\PokemonNickname;
use App\Tests\Fixtures\Domain\Common\ValueObject\ValueObjectMother as CommonValueObjectMother;
use App\Tests\Fixtures\Domain\Pokemon\Entity\EntityMother;
use App\Tests\Fixtures\Domain\Pokemon\ValueObject\ValueObjectMother as PokemonValueObjectMother;
use App\Tests\Unit\TestCase;

class PokemonTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(
        Uuid $uuid,
        Specie $specie,
        ?PokemonNickname $nickname
    ): void {
        $pokemon = EntityMother::makePokemon(
            uuid: $uuid,
            specie: $specie,
            nickname: $nickname
        );

        $this->assertEquals($uuid, $pokemon->getUuid());
        $this->assertEquals($specie, $pokemon->getSpecie());
        $this->assertEquals(
            $nickname ?? PokemonNickname::fromSpecieName($specie->getName()),
            $pokemon->getNickname()
        );
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            [
                CommonValueObjectMother::makeUuid(),
                EntityMother::makeDefaultSpecie(),
                null
            ],
            [
                CommonValueObjectMother::makeUuid(),
                EntityMother::makeDefaultSpecie(),
                PokemonValueObjectMother::makePokemonNickname()
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
        ?Specie $specie,
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
                EntityMother::makeDefaultSpecie(),
                null,
            ],
            'specie as null' => [
                RequiredFieldIsMissingException::class,
                RequiredFieldIsMissingException::makeByFieldName(Pokemon::SPECIE)->getMessage(),
                CommonValueObjectMother::makeUuid(),
                null,
                null,
            ],
        ];
    }
}
