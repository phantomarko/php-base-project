<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\ValueObject;

use App\Tests\Fixtures\Domain\ValueObject\ValueObjectMother;
use PHPUnit\Framework\TestCase;

class AbstractCollectionTest extends TestCase
{
    /**
     * @dataProvider createProvider
     */
    public function testCreate(array $array): void
    {
        $collection = ValueObjectMother::makeCollection($array);

        $this->assertEquals($array, $collection->toArray());
    }

    public static function createProvider(): array
    {
        return [
            'empty array' => [[]],
            'strings' => [['one', 'two', 'three']],
        ];
    }

    public function testInterfaces(): void
    {
        $array = ['a', 'b', 'c'];
        $array_count = count($array);

        $letters = ValueObjectMother::makeCollection($array);

        $iterations = 0;
        foreach ($letters as $key => $letter) {
            $iterations++;
            $this->assertEquals($array[$key], $letter);
        }
        $this->assertEquals($array_count, $iterations);
        $this->assertEquals($array_count, $letters->count());
        $this->assertEquals($array_count, count($letters));
    }
}
