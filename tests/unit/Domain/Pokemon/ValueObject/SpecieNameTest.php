<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Pokemon\ValueObject;

use App\Domain\Pokemon\Exception\SpecieNameIsNotValidException;
use App\Domain\Pokemon\ValueObject\SpecieName;
use App\Tests\Fixtures\Domain\Pokemon\ValueObject\ValueObjectMother;
use App\Tests\Unit\TestCase;

class SpecieNameTest extends TestCase
{
    /**
     * @dataProvider createSuccessfullyProvider
     */
    public function testCreateSuccessfully(string $value): void
    {
        $name = ValueObjectMother::makeSpecieName($value);

        $this->assertEquals($value, $name->getValue());
    }

    public static function createSuccessfullyProvider(): array
    {
        return [
            'real name' => ['SQUIRTLE'],
            'equals to min length' => [str_repeat('s', SpecieName::MIN_LENGTH)],
            'min length plus one' => [str_repeat('s', SpecieName::MIN_LENGTH + 1)],
            'max length minus one' => [str_repeat('s', SpecieName::MAX_LENGTH - 1)],
            'equals to max length' => [str_repeat('s', SpecieName::MAX_LENGTH)],
        ];
    }

    /**
     * @dataProvider createUnsuccessfullyProvider
     */
    public function testCreateUnsuccessfully(string $value): void
    {
        $this->expectException(SpecieNameIsNotValidException::class);
        ValueObjectMother::makeSpecieName($value);
    }

    public static function createUnsuccessfullyProvider(): array
    {
        return [
            'empty string' => [''],
            'blank spaces' => [str_repeat(' ', SpecieName::MIN_LENGTH)],
            'shorter than min length' => [str_repeat('s', SpecieName::MIN_LENGTH - 1)],
            'larger than max length' => [str_repeat('s', SpecieName::MAX_LENGTH + 1)],
        ];
    }
}
