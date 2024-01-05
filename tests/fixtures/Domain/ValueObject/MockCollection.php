<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Domain\ValueObject;

use App\Domain\ValueObject\AbstractCollection;

/**
 * Mock class used to test AbstractCollection
 */
final class MockCollection extends AbstractCollection
{
    protected function validateItems(array $items): void
    {
    }
}
