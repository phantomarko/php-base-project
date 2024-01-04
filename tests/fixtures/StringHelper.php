<?php

declare(strict_types=1);

namespace App\Tests\Fixtures;

use Ramsey\Uuid\Uuid;

trait StringHelper
{
    public static function generateUuidRfc4122(): string
    {
        return Uuid::uuid6()->toString();
    }
}
