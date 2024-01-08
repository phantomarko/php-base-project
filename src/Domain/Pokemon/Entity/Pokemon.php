<?php

declare(strict_types=1);

namespace App\Domain\Pokemon\Entity;

use App\Domain\Common\Exception\RequiredFieldIsMissingException;
use App\Domain\Common\ValueObject\Uuid;
use App\Domain\Pokemon\ValueObject\SpecieName;
use App\Domain\Pokemon\ValueObject\PokemonNickname;

class Pokemon
{
    public const UUID = 'uuid';
    public const SPECIE = 'specie';
    public const NICKNAME = 'nickname';

    private Uuid $uuid;
    private Specie $specie;
    private PokemonNickname $nickname;

    public function __construct(
        ?Uuid $uuid = null,
        ?Specie $specie = null,
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

    public function getSpecie(): Specie
    {
        return $this->specie;
    }

    private function getSpecieName(): SpecieName
    {
        return $this->getSpecie()->getName();
    }

    private function setSpecie(?Specie $specie): void
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
            $nickname = PokemonNickname::fromSpecieName($this->getSpecieName());
        }
        $this->nickname = $nickname;
    }
}
