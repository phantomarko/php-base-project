<?php

declare(strict_types=1);

namespace App\Application\Pokemon\Command\CreateSpecie;

final class CreateSpecieCommand
{
    /**
     * @param string[]|null $types
     */
    public function __construct(
        private readonly ?int $id = null,
        private readonly ?string $name = null,
        private readonly ?array $types = null
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getTypes(): ?array
    {
        return $this->types;
    }
}
