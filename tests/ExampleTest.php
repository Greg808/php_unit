<?php


use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testAddingTwoPlusTwoIsFour()
    {
        self::assertEquals(4, 2 + 2);
    }
}