<?php

declare(strict_types=1);

namespace App\Domain\Pokemon\Entity;

use App\Domain\Common\Exception\RequiredFieldIsMissingException;
use App\Domain\Common\ValueObject\Id;
use App\Domain\Pokemon\ValueObject\PokemonName;
use App\Domain\Pokemon\ValueObject\PokemonTypeCollection;

class PokemonSpecie
{
    public const ID = 'id';
    public const NAME = 'name';
    public const TYPES = 'types';

    private Id $id;
    private PokemonName $name;
    private PokemonTypeCollection $types;

    public function __construct(
        ?Id $id = null,
        ?PokemonName $name = null,
        ?PokemonTypeCollection $types = null
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

    public function getName(): PokemonName
    {
        return $this->name;
    }

    private function setName(?PokemonName $name): void
    {
        if (is_null($name)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::NAME);
        }
        $this->name = $name;
    }

    public function getTypes(): PokemonTypeCollection
    {
        return $this->types;
    }

    private function setTypes(?PokemonTypeCollection $types): void
    {
        if (is_null($types)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::TYPES);
        }
        $this->types = $types;
    }
}
