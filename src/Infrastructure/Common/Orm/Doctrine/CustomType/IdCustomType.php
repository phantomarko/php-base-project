<?php

declare(strict_types=1);

namespace App\Infrastructure\Common\Orm\Doctrine\CustomType;

use App\Domain\Common\ValueObject\Id;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\IntegerType;

final class IdCustomType extends IntegerType
{
    public function getName(): string
    {
        return 'custom_id';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?Id
    {
        $value = parent::convertToPHPValue($value, $platform);
        return is_null($value) ? null : new Id($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        $db_value = $value?->getValue();
        return parent::convertToDatabaseValue($db_value, $platform);
    }
}
