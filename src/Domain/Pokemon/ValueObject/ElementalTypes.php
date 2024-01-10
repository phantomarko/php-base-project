<?php

declare(strict_types=1);

namespace App\Domain\Pokemon\ValueObject;

use App\Domain\Common\ValueObject\AbstractCollection;
use App\Domain\Pokemon\Exception\ElementalTypesContainsInvalidItemException;
use App\Domain\Pokemon\Exception\NumberOfElementalTypesIsGreaterThanExpectedException;

/**
 * @template TKey
 * @template-covariant TValue
 * @template-extends AbstractCollection<TKey, TValue>
 */
final class ElementalTypes extends AbstractCollection
{
    public const ITEMS_LIMIT = 2;

    protected function validateItems(array $items): void
    {
        if (count($items) > self::ITEMS_LIMIT) {
            throw NumberOfElementalTypesIsGreaterThanExpectedException::makeByItemsLimit(self::ITEMS_LIMIT);
        }

        /** @var ElementalType $item */
        foreach ($items as $item) {
            if (!$item instanceof ElementalType) {
                throw ElementalTypesContainsInvalidItemException::make();
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
                throw ElementalTypesContainsInvalidItemException::make();
            }

            return new ElementalType($value);
        }, $array);
        return new self($items);
    }
}
