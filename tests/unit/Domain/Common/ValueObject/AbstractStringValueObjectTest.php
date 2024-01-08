<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Common\ValueObject;

use App\Tests\Fixtures\Domain\Common\ValueObject\MockStringValueObject;
use PHPUnit\Framework\TestCase;

class AbstractStringValueObjectTest extends TestCase
{
    /**
     * @dataProvider createProvider
     */
    public function testCreate(?string $value): void
    {
        $value_object = MockStringValueObject::tryFrom($value);

        $this->assertEquals($value, $value_object?->getValue());
    }

    public static function createProvider(): array
    {
        return [
            'null' => [null],
            'empty string' => [''],
            'string' => ['string'],
        ];
    }
}
