<?php

declare(strict_types=1);

namespace App\Infrastructure\Pokemon\Orm\Doctrine\CustomType;

use App\Domain\Pokemon\ValueObject\ElementalTypes;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\JsonType;

final class ElementalTypesCustomType extends JsonType
{
    public function getName(): string
    {
        return 'elemental_types';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?ElementalTypes
    {
        $value = parent::convertToPHPValue($value, $platform);
        return empty($value) ? null : ElementalTypes::tryFrom($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        $db_value = $value?->toArray();
        return parent::convertToDatabaseValue($db_value, $platform);
    }
}
