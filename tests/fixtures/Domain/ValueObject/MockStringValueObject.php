<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Domain\ValueObject;

use App\Domain\ValueObject\AbstractStringValueObject;

/**
 * Mock class used to test AbstractStringValueObject
 */
final class MockStringValueObject extends AbstractStringValueObject
{
    protected function validate(string $value): void
    {
    }
}
