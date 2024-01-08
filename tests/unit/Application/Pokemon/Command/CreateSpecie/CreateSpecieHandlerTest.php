<?php

declare(strict_types=1);

namespace App\Tests\Unit\Application\Pokemon\Command\CreateSpecie;

use App\Application\Pokemon\Command\CreateSpecie\CreateSpecieCommand;
use App\Domain\Pokemon\Repository\SpecieRepositoryInterface;
use App\Domain\Pokemon\ValueObject\ElementalType;
use App\Tests\Fixtures\Application\Pokemon\Command\CommandObjectMother;
use PHPUnit\Framework\TestCase;

class CreateSpecieHandlerTest extends TestCase
{
    /**
     * @dataProvider createProvider
     */
    public function testCreate(CreateSpecieCommand $command): void
    {
        $repository = $this->createMock(SpecieRepositoryInterface::class);
        $repository->expects($this->once())
            ->method('save');
        $handler = CommandObjectMother::makeCreateSpecieHandler($repository);

        $handler->handle($command);
    }

    public static function createProvider(): array
    {
        return [
            [
                CommandObjectMother::makeCreateSpecieCommand(
                    9,
                    'BLASTOISE',
                    [ElementalType::WATER]
                )
            ],
        ];
    }
}
