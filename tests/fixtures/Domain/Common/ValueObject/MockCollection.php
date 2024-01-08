<?php

declare(strict_types=1);

namespace App\Tests\Fixtures\Domain\Common\ValueObject;

use App\Domain\Common\ValueObject\AbstractCollection;

/**
 * @template TKey
 * @template-covariant TValue
 * @template-extends AbstractCollection<TKey, TValue>
 */
final class MockCollection extends AbstractCollection
{
    protected function validateItems(array $items): void
    {
    }
}
