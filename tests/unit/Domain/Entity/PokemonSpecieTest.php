<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Entity;

use App\Domain\ValueObject\Id;
use App\Tests\Fixtures\Domain\Entity\EntityMother;
use App\Tests\Fixtures\Domain\ValueObject\ValueObjectMother;
use App\Tests\Unit\TestCase;

class PokemonSpecieTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(Id $id): void
    {
        $pokemon_specie = EntityMother::makePokemonSpecie($id);

        $this->assertEquals($id, $pokemon_specie->getId());
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            [ValueObjectMother::makeId()],
        ];
    }
}
