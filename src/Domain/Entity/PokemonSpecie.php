<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\Exception\RequiredFieldIsMissingException;
use App\Domain\ValueObject\Id;
use App\Domain\ValueObject\PokemonName;

class PokemonSpecie
{
    public const ID = 'id';
    public const NAME = 'name';

    private Id $id;
    private PokemonName $name;

    public function __construct(
        ?Id $id = null,
        ?PokemonName $name = null
    ) {
        $this->setId($id);
        $this->setName($name);
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
}
