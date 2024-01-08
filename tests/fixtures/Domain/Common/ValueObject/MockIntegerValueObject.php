<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Domain\Common\ValueObject;

use App\Domain\Common\ValueObject\AbstractIntegerValueObject;

/**
 * Mock class used to test AbstractIntegerValueObject
 */
final class MockIntegerValueObject extends AbstractIntegerValueObject
{
    protected function validate(int $value): void
    {
    }
}
