<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Domain\ValueObject;

use App\Domain\ValueObject\AbstractIntegerValueObject;

/**
 * Mock class used to test AbstractIntegerValueObject
 */
final class MockIntegerValueObject extends AbstractIntegerValueObject
{
    protected function validate(int $value): void
    {
    }
}
