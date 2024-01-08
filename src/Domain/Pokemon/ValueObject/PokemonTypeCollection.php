<?php

declare(strict_types=1);

namespace App\Domain\Pokemon\ValueObject;

use App\Domain\Common\ValueObject\AbstractCollection;
use App\Domain\Pokemon\Exception\PokemonTypeCollectionHasInvalidItemException;

/**
 * @template TKey
 * @template-covariant TValue
 * @template-extends AbstractCollection<TKey, TValue>
 */
final class PokemonTypeCollection extends AbstractCollection
{
    protected function validateItems(array $items): void
    {
        /** @var PokemonType $item */
        foreach ($items as $item) {
            if (!$item instanceof PokemonType) {
                throw PokemonTypeCollectionHasInvalidItemException::make();
            }
        }
    }
}
