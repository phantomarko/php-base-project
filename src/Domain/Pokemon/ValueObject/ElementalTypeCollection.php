<?php

declare(strict_types=1);

namespace App\Domain\Pokemon\ValueObject;

use App\Domain\Common\ValueObject\AbstractCollection;
use App\Domain\Pokemon\Exception\ElementalTypeCollectionHasInvalidItemException;

/**
 * @template TKey
 * @template-covariant TValue
 * @template-extends AbstractCollection<TKey, TValue>
 */
final class ElementalTypeCollection extends AbstractCollection
{
    protected function validateItems(array $items): void
    {
        /** @var ElementalType $item */
        foreach ($items as $item) {
            if (!$item instanceof ElementalType) {
                throw ElementalTypeCollectionHasInvalidItemException::make();
            }
        }
    }

    public function toArray(): array
    {
        return array_map(fn(ElementalType $type): string => $type->getValue(), $this->items);
    }

    public static function fromArray(array $array): static
    {
        $items = array_map(function (mixed $value): ElementalType {
            if (!is_string($value)) {
                throw ElementalTypeCollectionHasInvalidItemException::make();
            }

            return new ElementalType($value);
        }, $array);
        return new self($items);
    }
}
