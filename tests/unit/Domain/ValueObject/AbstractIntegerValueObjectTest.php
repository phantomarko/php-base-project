<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\ValueObject;

use App\Tests\Fixtures\Domain\ValueObject\MockIntegerValueObject;
use PHPUnit\Framework\TestCase;

class AbstractIntegerValueObjectTest extends TestCase
{
    /**
     * @dataProvider createProvider
     */
    public function testCreate(?int $value): void
    {
        $value_object = MockIntegerValueObject::tryFrom($value);

        $this->assertEquals($value, $value_object?->getValue());
    }

    public static function createProvider(): array
    {
        return [
            'null' => [null],
            'zero' => [0],
            'positive' => [1],
            'negative' => [-1],
        ];
    }
}
