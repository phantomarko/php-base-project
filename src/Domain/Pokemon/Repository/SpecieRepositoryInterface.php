<?php

declare(strict_types=1);

namespace App\Domain\Pokemon\Repository;

use App\Domain\Pokemon\Entity\Specie;

interface SpecieRepositoryInterface
{
    public function save(Specie $specie): void;
}
