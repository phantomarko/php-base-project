<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\Exception\RequiredFieldIsMissingException;
use App\Domain\ValueObject\PokemonName;
use App\Domain\ValueObject\PokemonNickname;
use App\Domain\ValueObject\Uuid;

class Pokemon
{
    public const UUID = 'uuid';
    public const SPECIE = 'specie';
    public const NICKNAME = 'nickname';

    private Uuid $uuid;
    private PokemonSpecie $specie;
    private PokemonNickname $nickname;

    public function __construct(
        ?Uuid $uuid = null,
        ?PokemonSpecie $specie = null,
        ?PokemonNickname $nickname = null
    ) {
        $this->setUuid($uuid);
        $this->setSpecie($specie);
        $this->setNickname($nickname);
    }

    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

    private function setUuid(?Uuid $uuid): void
    {
        if (is_null($uuid)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::UUID);
        }
        $this->uuid = $uuid;
    }

    public function getSpecie(): PokemonSpecie
    {
        return $this->specie;
    }

    private function getSpecieName(): PokemonName
    {
        return $this->getSpecie()->getName();
    }

    private function setSpecie(?PokemonSpecie $specie): void
    {
        if (is_null($specie)) {
            throw RequiredFieldIsMissingException::makeByFieldName(self::SPECIE);
        }
        $this->specie = $specie;
    }

    public function getNickname(): PokemonNickname
    {
        return $this->nickname;
    }

    private function setNickname(?PokemonNickname $nickname): void
    {
        if (is_null($nickname)) {
            $nickname = $this->getSpecieName()->toNickname();
        }
        $this->nickname = $nickname;
    }
}
