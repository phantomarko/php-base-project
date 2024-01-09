<?php

declare(strict_types=1);

namespace App\Infrastructure\Pokemon\Orm\Doctrine\CustomType;

use App\Domain\Pokemon\ValueObject\SpecieName;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

final class SpecieNameCustomType extends StringType
{
    public function getName(): string
    {
        return 'specie_name';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?SpecieName
    {
        $value = parent::convertToPHPValue($value, $platform);
        return is_null($value) ? null : new SpecieName($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        $db_value = $value?->getValue();
        return parent::convertToDatabaseValue($db_value, $platform);
    }
}
