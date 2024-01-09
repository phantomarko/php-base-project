<?php

declare(strict_types=1);

namespace App\Domain\Common\ValueObject;

use Countable;
use Iterator;

/**
 * @template TKey
 * @template-covariant TValue
 * @template-implements Iterator<TKey, TValue>
 */
abstract class AbstractCollection implements Iterator, Countable
{
    protected array $items;
    protected int $pointer;

    final public function __construct(array $items)
    {
        $this->validateItems($items);
        $this->items = array_values($items);
        $this->pointer = 0;
    }

    abstract protected function validateItems(array $items): void;

    final public function current(): mixed
    {
        return $this->items[$this->pointer];
    }

    final public function key(): int
    {
        return $this->pointer;
    }

    final public function next(): void
    {
        $this->pointer++;
    }

    final public function rewind(): void
    {
        $this->pointer = 0;
    }

    final public function valid(): bool
    {
        return $this->pointer < $this->count();
    }

    final public function count(): int
    {
        return count($this->items);
    }

    public static function tryFrom(?array $array): ?static
    {
        if (is_null($array)) {
            return null;
        }

        return static::fromArray($array);
    }

    abstract public function toArray(): array;

    abstract public static function fromArray(array $array): static;
}
