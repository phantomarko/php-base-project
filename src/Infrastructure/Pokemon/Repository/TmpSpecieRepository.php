<?php

declare(strict_types=1);

namespace App\Infrastructure\Pokemon\Repository;

use App\Domain\Pokemon\Entity\Specie;
use App\Domain\Pokemon\Repository\SpecieRepositoryInterface;

final class TmpSpecieRepository implements SpecieRepositoryInterface
{
    private array $species = [];

    public function save(Specie $specie): void
    {
        $this->species[$specie->getId()->getValue()] = $specie;
    }
}
