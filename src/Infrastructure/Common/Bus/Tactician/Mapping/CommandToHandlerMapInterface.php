<?php

declare(strict_types=1);

namespace App\Infrastructure\Common\Bus\Tactician\Mapping;

interface CommandToHandlerMapInterface
{
    /**
     * @return array<string, string> array of mappings with the command as key holding the handler as value
     */
    public function get(): array;
}
