<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Pokemon\ValueObject;

use App\Domain\Pokemon\Exception\PokemonNicknameIsNotValidException;
use App\Domain\Pokemon\ValueObject\PokemonNickname;
use App\Tests\Fixtures\Domain\Pokemon\ValueObject\ValueObjectMother;
use App\Tests\Unit\TestCase;

class PokemonNicknameTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(string $value): void
    {
        $name = ValueObjectMother::makePokemonNickname($value);

        $this->assertEquals($value, $name->getValue());
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            'example nickname' => ['BLUE'],
            'equals to min length' => [str_repeat('s', PokemonNickname::MIN_LENGTH)],
            'min length plus one' => [str_repeat('s', PokemonNickname::MIN_LENGTH + 1)],
            'max length minus one' => [str_repeat('s', PokemonNickname::MAX_LENGTH - 1)],
            'equals to max length' => [str_repeat('s', PokemonNickname::MAX_LENGTH)],
        ];
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(string $value): void
    {
        $this->expectException(PokemonNicknameIsNotValidException::class);
        ValueObjectMother::makePokemonNickname($value);
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'empty string' => [''],
            'blank spaces' => [str_repeat(' ', PokemonNickname::MIN_LENGTH)],
            'shorter than min length' => [str_repeat('s', PokemonNickname::MIN_LENGTH - 1)],
            'larger than max length' => [str_repeat('s', PokemonNickname::MAX_LENGTH + 1)],
        ];
    }

    public function testCreateFromNickname(): void
    {
        $value = 'CHARMANDER';
        $name = ValueObjectMother::makeSpecieName($value);
        $nickname = PokemonNickname::fromSpecieName($name);

        $this->assertEquals($value, $nickname->getValue());
    }
}
