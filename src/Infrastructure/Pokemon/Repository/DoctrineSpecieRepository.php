<?php

declare(strict_types=1);

namespace App\Infrastructure\Pokemon\Repository;

use App\Domain\Pokemon\Entity\Specie;
use App\Domain\Pokemon\Repository\SpecieRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class DoctrineSpecieRepository extends ServiceEntityRepository implements SpecieRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Specie::class);
    }

    public function save(Specie $specie): void
    {
        $this->getEntityManager()->persist($specie);
        $this->getEntityManager()->flush();
    }
}
