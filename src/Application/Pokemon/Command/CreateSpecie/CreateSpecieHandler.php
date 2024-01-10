<?php

declare(strict_types=1);

namespace App\Application\Pokemon\Command\CreateSpecie;

use App\Domain\Common\ValueObject\Id;
use App\Domain\Pokemon\Entity\Specie;
use App\Domain\Pokemon\Repository\SpecieRepositoryInterface;
use App\Domain\Pokemon\ValueObject\SpecieName;
use App\Domain\Pokemon\ValueObject\ElementalTypes;

final class CreateSpecieHandler
{
    public function __construct(private readonly SpecieRepositoryInterface $repository)
    {
    }

    public function handle(CreateSpecieCommand $command): void
    {
        $specie = new Specie(
            Id::tryFrom($command->getId()),
            SpecieName::tryFrom($command->getName()),
            ElementalTypes::tryFrom($command->getTypes())
        );

        $this->repository->save($specie);
    }
}
