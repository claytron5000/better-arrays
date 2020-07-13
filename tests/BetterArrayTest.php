<?php

use PHPUnit\Framework\TestCase;
use BetterArray\BetterArray;

final class BetterArrayTest extends TestCase
{
    public function testBasicInstantiation(): void
    {
        $this->assertInstanceOf(
            BetterArray::class,
            BetterArray::funcify([])
        );
    }
    public function testReturnsArray() :void
    {
        $betterArray = new BetterArray([]);
        var_dump($betterArray);
//        $this->assertIsArray($betterArray);
    }
}