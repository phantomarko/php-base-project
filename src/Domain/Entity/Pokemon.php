<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\ValueObject\Uuid;

class Pokemon
{
    public function __construct(private readonly Uuid $uuid)
    {
    }

    public function getUuid(): Uuid
    {
        return $this->uuid;
    }
}
