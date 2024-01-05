<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

use App\Domain\Exception\PokemonNicknameIsNotValidException;

final class PokemonNickname extends PokemonName
{
    public const MIN_LENGTH = 1;

    protected function throwInvalidException(): void
    {
        throw PokemonNicknameIsNotValidException::make();
    }
}
