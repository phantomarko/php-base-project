<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\ValueObject;

use App\Domain\Exception\PokemonNameIsNotValidException;
use App\Domain\ValueObject\PokemonName;
use App\Tests\Fixtures\Domain\ValueObject\ValueObjectMother;
use App\Tests\Unit\TestCase;

class PokemonNameTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(string $value): void
    {
        $name = ValueObjectMother::makePokemonName($value);

        $this->assertEquals($value, $name->getValue());
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            'real name' => ['PIKACHU'],
            'equals to min length' => [str_repeat('s', PokemonName::MIN_LENGTH)],
            'min length plus one' => [str_repeat('s', PokemonName::MIN_LENGTH + 1)],
            'max length minus one' => [str_repeat('s', PokemonName::MAX_LENGTH - 1)],
            'equals to max length' => [str_repeat('s', PokemonName::MAX_LENGTH)],
        ];
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(string $value): void
    {
        $this->expectException(PokemonNameIsNotValidException::class);
        ValueObjectMother::makePokemonName($value);
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'empty string' => [''],
            'blank spaces' => [str_repeat(' ', PokemonName::MIN_LENGTH)],
            'shorter than min length' => [str_repeat('s', PokemonName::MIN_LENGTH - 1)],
            'larger than max length' => [str_repeat('s', PokemonName::MAX_LENGTH + 1)],
        ];
    }
}
