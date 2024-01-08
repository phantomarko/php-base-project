<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Domain\Common\ValueObject;

use App\Domain\Common\ValueObject\AbstractStringValueObject;

/**
 * Mock class used to test AbstractStringValueObject
 */
final class MockStringValueObject extends AbstractStringValueObject
{
    protected function validate(string $value): void
    {
    }
}
