<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\ValueObject;

use App\Domain\Exception\PokemonTypeIsNotValidException;
use App\Domain\ValueObject\PokemonType;
use App\Tests\Fixtures\Domain\ValueObject\ValueObjectMother;
use App\Tests\Unit\TestCase;

class PokemonTypeTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(string $value): void
    {
        $type = ValueObjectMother::makePokemonType($value);

        $this->assertEquals($value, $type->getValue());
    }

    public static function createSuccessfullyProvider(): array
    {
        return array_map(fn(string $case): array => [$case], PokemonType::CASES);
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(string $value): void
    {
        $this->expectException(PokemonTypeIsNotValidException::class);
        ValueObjectMother::makePokemonType($value);
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'empty string' => [''],
            'blank space' => [' '],
            'case not allowed' => ['FAIRY'],
        ];
    }
}
