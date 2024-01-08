<?php

declare(strict_types=1);

namespace App\Domain\Pokemon\Entity;

use App\Domain\Common\Exception\RequiredFieldIsMissingException;
use App\Domain\Common\ValueObject\Id;
use App\Domain\Pokemon\ValueObject\SpecieName;
use App\Domain\Pokemon\ValueObject\ElementalTypeCollection;

class Specie
{
    public const ID = 'id';
    public const NAME = 'name';
    public const TYPES = 'types';

    private Id $id;
    private SpecieName $name;
    private ElementalTypeCollection $types;

    public function __construct(
        ?Id $id = null,
        ?SpecieName $name = null,
        ?ElementalTypeCollection $types = null
    ) {
        $this->setId($id);
        $this->setName($name);
        $this->setTypes($types);
    }

    public function getId(): Id
    {
        return $this->id;
    }

    private function setId(?Id $id): void
    {
        if (is_null($id)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::ID);
        }
        $this->id = $id;
    }

    public function getName(): SpecieName
    {
        return $this->name;
    }

    private function setName(?SpecieName $name): void
    {
        if (is_null($name)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::NAME);
        }
        $this->name = $name;
    }

    public function getTypes(): ElementalTypeCollection
    {
        return $this->types;
    }

    private function setTypes(?ElementalTypeCollection $types): void
    {
        if (is_null($types)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::TYPES);
        }
        $this->types = $types;
    }
}
