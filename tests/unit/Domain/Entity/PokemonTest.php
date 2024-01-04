<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Entity;

use App\Domain\ValueObject\Uuid;
use App\Tests\Fixtures\Domain\Entity\EntityMother;
use App\Tests\Fixtures\Domain\ValueObject\ValueObjectMother;
use App\Tests\Unit\TestCase;

class PokemonTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(Uuid $uuid): void
    {
        $pokemon = EntityMother::makePokemon($uuid);

        $this->assertEquals($uuid, $pokemon->getUuid());
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            [ValueObjectMother::makeUuid()],
        ];
    }
}
